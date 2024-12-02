<?php
namespace App\Services;

use App\Models\Staff;


class StaffService
{
    protected $staff;

    public function __construct(Staff $staff)
    {
        $this->staff = $staff;
    }

    public function getStaffById($id)
    {
        return $this->staff::find($id);
    }

    public function updateStaff($staff, $id)
    {
        $oldStaff = $this->getStaffById($id);
        $validatedData = $staff->validated();

        if ($staff->hasFile('avatar')) {
            $image = $staff->file('avatar');
            $imageName = basename($image);
            $image->move(public_path('img/'), $imageName);
            $validatedData['avatar'] = $imageName;

            if ($staff->image && file_exists(public_path('img/' . $staff->avatar))) {
                unlink(public_path('img/' . $staff->avatar));
            }
        }

        $oldStaff->update($validatedData);
    }
}