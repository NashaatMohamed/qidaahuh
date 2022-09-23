<?php

namespace App\Http\Controllers;

use App\Mail\EventMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class NewPasswordController extends Controller
{
    public function forgotPassword(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([

            'email' => 'required|string|email',

        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            // 1 generate verification code
            $user->reset_verification_code = rand(100000, 999999);
            $user->save();
            // 2 send email
            Mail::to($user->email)->send(new EventMail($user));
            return response()->json(['status' => true, 'message' => 'check your inbox']);

        } else {
            return response()->json(['status' => false, 'message' => 'email not found, try again']);
        }


    }

    public function checkCode(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->reset_verification_code == $request->code) {
                return response()->json(['status' => true, 'message' => 'you will be redirected to set new password']);
            }
            return response()->json(['status' => false, 'message' => 'code is invalid, try again']);

        } else {
            return response()->json(['status' => false, 'message' => 'email not found, try again']);
        }
    }

    public function reset(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([$user->password,'status' => true, 'message' => 'password has been updated']);

        } else {
            return response()->json(['status' => false, 'message' => 'email not found, try again']);
        }


    }
}
