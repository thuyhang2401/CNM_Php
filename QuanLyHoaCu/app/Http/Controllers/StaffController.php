<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffProfileRequest;
use App\Services\StaffService;

class StaffController extends Controller
{
    protected $staffService;

    public function __construct(StaffService $staffService)
    {
        $this->staffService = $staffService;
    }

    public function show(string $id)
    {
        $staff = $this->staffService->getStaffById($id);
        if (!$staff) {
            return redirect()->back()->with('error', 'Nhân viên không tồn tại.');
        }
        return view('staff.profile', compact('staff'));
    }

    public function update(StaffProfileRequest $request, string $id)
    {
        try {
            $staff = $this->staffService->getStaffById($id);
            if (!$staff) {
                return redirect()->back()->with('error', 'Nhân viên không tồn tại.');
            }

            $this->staffService->updateStaff($request, $id);
            return redirect()->back()->with('success', 'Thông tin tài khoản được cập nhật thành công!');
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra khi cập nhật thông tin tài khoản. Vui lòng thử lại.');
        }

    }

}
