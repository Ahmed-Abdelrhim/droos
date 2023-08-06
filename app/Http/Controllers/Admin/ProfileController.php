<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileRequest;
use App\Services\Admin\ProfileService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    private ProfileService $profileService;
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function showTeacherProfile(): View
    {
        $admin = auth()->guard('admin')->user();
        return view('admin.teacher_profile', ['admin' => $admin]);
    }

    public function updateAdminProfile(AdminProfileRequest $request): RedirectResponse
    {
        $request->validated();
        $this->profileService->updateProfile($request);
        $notification = array('message' => 'Your Profile has been Updated Successfully' ,'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
