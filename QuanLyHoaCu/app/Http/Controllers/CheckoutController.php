<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Payments;
use App\Services\CartService;
use App\Services\OrderCustomerService;
use App\Services\OrderDetailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    protected $orderService;
    protected $orderDetailService;
    protected $cartService;

    public function __construct(OrderCustomerService $orderService, OrderDetailService $orderDetailService, CartService $cartService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
        $this->cartService = $cartService;
    }

    public function index()
    {
        $cartQuantity = $this->cartService->getCartQuantity(session('customerId'));
        $selectedCarts = session('selectedCarts', []);

        $subTotal = 0;
        foreach ($selectedCarts as $cart) {
            if ($cart->product) {
                $subTotal += $cart->quantity * $cart->product->price;
            }
        }

        return View('checkout', compact('selectedCarts', 'cartQuantity', 'subTotal'));
    }

    public function createOrder(OrderRequest $request)
    {

        $name = $request->input('name');
        $address = $request->input('shipping_address');
        $phone = $request->input('phone_number');
        $note = $request->input('note');
        $payment = 'Thanh toán khi nhận hàng';
        $customerId = session('customerId');

        try {
            // Insert order
            $order = $this->orderService->add($name, $address, $phone, $note, $payment, $customerId);

            // Insert order detail
            $productOrders = session('selectedCarts', []);

            foreach ($productOrders as $cart) {
                $this->orderDetailService->add($order->order_id, $cart->product->product_id, $cart->quantity);
                $this->cartService->deleteProductInCart($cart->product->product_id, session('customerId'));
            }

            session()->forget('selectedCarts');

            return redirect()->route('cart.list')->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('error', 'Có lỗi xảy ra khi đặt hàng. Vui lòng thử lại.');
        }
    }

    public function vnpayPayment(OrderRequest $request)
    {
        $name = $request->input('name');
        $address = $request->input('shipping_address');
        $phone = $request->input('phone_number');
        $note = $request->input('note');
        $payment = 'VnPay';
        $customerId = session('customerId');

        // try {
        // Insert order
        $order = $this->orderService->add($name, $address, $phone, $note, $payment, $customerId);

        // Insert order detail
        $productOrders = session('selectedCarts', []);
        $total_money = 0;

        foreach ($productOrders as $cart) {
            $this->orderDetailService->add($order->order_id, $cart->product->product_id, $cart->quantity);
            $this->cartService->deleteProductInCart($cart->product->product_id, session('customerId'));
            $total_money += $cart->quantity * $cart->product->price;
        }

        session()->forget('selectedCarts');

        $total_money = $total_money + $order->delivery_fee;

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/QuanLyHoaCu/checkout/vnpay-return";
        $vnp_TmnCode = "I6CZRHN3"; //Mã website tại VNPAY 
        $vnp_HashSecret = "3RR981WNF15SIVXGJO0OVTO7RLS11LW6"; //Chuỗi bí mật

        $vnp_TxnRef = $order->order_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toan Don hang ' . $order->order_id;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $total_money * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        //$vnp_ExpireDate = $_POST['txtexpire'];
        //Billing

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect($vnp_Url);
    }

    public function vnpayReturn(Request $request)
    {
        if ($request->vnp_ResponseCode == '00') {
            try {
                $vnpayData = $request->all();
                $customerId = session('customerId');

                $dataPayment = [
                    'total_money' => $vnpayData['vnp_Amount'] / 100,
                    'note' => $vnpayData['vnp_OrderInfo'],
                    'vnp_response_code' => $vnpayData['vnp_ResponseCode'],
                    'code_vnpay' => $vnpayData['vnp_TransactionNo'],
                    'code_bank' => $vnpayData['vnp_BankCode'],
                    'time' => date('Y-m-d H:i', strtotime($vnpayData['vnp_PayDate'])),
                    'order_id' => $vnpayData['vnp_TxnRef'],
                    'customer_id' => $customerId
                ];
                Payments::create($dataPayment);

                $this->orderService->updatePaymenttimeOrder($dataPayment['order_id'], $dataPayment['time']);
                
                return view('vnpay.vnpay_return', compact('vnpayData'));
            } catch (\Exception $e) {
                Log::error($e);
                return back()->with('error', 'Có lỗi xảy ra khi đặt hàng. Vui lòng thử lại.');
            }
        } else {
            $this->orderService->cancelOrder($request->vnp_TxnRef);
            return redirect()->route('cart.list')->with('error', 'Thanh toán không thành công! Đơn hàng đã bị hủy.');
        }
    }
}
