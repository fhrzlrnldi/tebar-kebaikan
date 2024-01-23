<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class ForgetPasswordController extends Controller
{
    //
    public function index() {
        return view('auth.forgot-password'); // LUPA PASSWORD
    }
    public function forgetpassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $response = Password::sendResetLink($request->only('email'));

        if ($response === Password::RESET_LINK_SENT) {
            return back()->withSuccess('Email reset password telah dikirim!');
        }

        return back()->withFail( trans($response));
    }
    public function resetpassword($token)
    {
        # code...
        return view('auth.reset-password', [
        'token' => $token,
        'email'=>request('email')
    ]);
    }
    public function resetpasswordpost(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:5',
            'confirmation_password'=>'required|min:5|same:password'
        ]);
            $status = Password::reset(
                $request->only('email', 'password', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ]);
                    $user->save();
                    event(new PasswordReset($user));
                }
            );
         
            return $status === Password::PASSWORD_RESET
                        ? redirect()->route('login')->with('success', __($status))
                        : back()->withErrors(['email' => [__($status)]]);
    }
}
