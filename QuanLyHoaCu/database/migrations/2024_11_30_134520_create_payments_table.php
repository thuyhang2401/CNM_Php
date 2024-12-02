<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total_money')->nullable()->comment('Số tiền thanh toán');
            $table->string('note')->nullable()->comment('Nội dung thanh toán');
            $table->string('vnp_response_code', 255)->nullable()->comment('Mã phản hồi');
            $table->string('code_vnpay', 255)->nullable()->comment('Mã giao dịch vnpay');
            $table->string('code_bank', 255)->nullable()->comment('Mã ngân hàng');
            $table->dateTime('time')->nullable()->comment('Thời gian chuyển khoản');

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                ->references('order_id')
                ->on('orders')
                ->onDelete('cascade');

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')
                ->references('customer_id')
                ->on('customers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
