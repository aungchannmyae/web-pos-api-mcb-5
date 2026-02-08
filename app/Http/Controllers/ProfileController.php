<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeNameRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    // Logout the user
    public function logout(Request $request)
    {

        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'data' => ['message' => 'User Logged out Successfully.'],
        ]);
    }

    public function changeName(ChangeNameRequest $request)
    {
        $user = $request->user();
        $user->update('name', $request->name);
        return response()->json([
            'message' => 'Name Changed Successfully.',
            'data' => new ProfileResource($user),
        ]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = $request->user();
        if(!Hash::check($request->old_password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials', 401]);
        }
        $user->update('password', Hash::make($request->password));
        $user->tokens()->delete();
        return response()->json([
            'message' => 'Password Changed Successfully.',
        ]);
    }

    public function show(Request $request)
    {
        return response()->json([
            'message' => 'User Profile retrieved successfully.',
            'data' => new ProfileResource($request->user()),
        ]);
    }

}
