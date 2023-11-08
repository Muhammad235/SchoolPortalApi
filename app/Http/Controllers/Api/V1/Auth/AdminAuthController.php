<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminloginRequest;

class AdminAuthController extends Controller
{
    public function login(AdminloginRequest $request)
    {
        $request->validated($request->all());

        $admin = Admin::where('username', $request->username)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
           return response()->json([
                'error' => 'provided credentials are incorrect'
           ], 401);
        }

        return response()->json([
            'admin' => $admin,
            'token' => $admin->createToken($admin->username)->plainTextToken
        ]);

    }

    // public function logout()
    // {
    //     Auth::guard('student')->user()->currentAccessToken()->delete();

    //     return $this->success([
    //         'message' => 'logged out successfully'
    //     ]);
    // }
}
