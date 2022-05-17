<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Password_Reset;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = 'login';

    public function showResetPasswordForm($token)
    {
        return view('auth.passwords.confirm', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {

        $request->validate([


            'email' => 'required|email',
            'password' => 'required|confirmed|min:6|max:12',
            'password_confirmation' => 'required|min:6|max:12',

        ], [

            'email.required' => 'Please fill in this field',
            'email.required' => 'Please fill in this field',
            'password.required' => 'Please fill in this field',
            'password_confirmation.required' => 'Please fill in this field',


        ]);
        $cek = Password_Reset::where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$cek) {
            return redirect()->back()->with('error', 'Email verification has expired or not available');
        } else {


            User::where("email", $request->email)->update(["password" => Hash::make($request->password)]);
            Password_Reset::where(['email' => $request->email])->delete();
            return redirect('/login')->with('change_pwd', 'Your password has been changed');
        }
    }
}
