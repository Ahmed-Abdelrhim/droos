<?php
namespace App\Services\Admin;

use Illuminate\Support\Facades\DB;

class ProfileService
{
    public function updateProfile($request)
    {
        $admin = auth()->guard('admin')->user();

        $password = $admin->password;
        if ($request->password != null) {
            $password = $this->setPassword($request->password);
        }

        $image_name = $admin->avatar;
        if ($request->has('avatar')) {
            $this->setImage($admin);
        }

        $admin = $this->setAdminData($admin, $request , $password);
        return $admin;
    }

    public function setAdminData($admin , $request, $password)
    {
        try {
            DB::beginTransaction();
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => $password,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::commit();
        } catch (\Exception $e) {}

        return $admin;
    }

    public function setPassword($password): string
    {
        return $password = bcrypt($password);
    }
    public function setImage($admin)
    {
        $admin->addMediaFromRequest('avatar')->toMediaCollection('admins');
    }
}
