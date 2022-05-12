<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPwd;
use App\Models\Password_Reset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function submitForgetPasswordForm(Request $request)
    {
        $available = User::where('email', $request->email)->count();
        $token = Password_Reset::where('email', $request->email)->count();

        if ($available > 0) {
            if ($token == 0) {

                $j = Password_Reset::create([
                    'email' => $request->email,
                    'token' =>  sha1(time()),
                    'created_at' => Carbon::now()
                ]);

                Mail::to($request->email)->send(new ResetPwd($j->token));

                return redirect()->back()->with('success', 'Check your email now');
            } else {
                return redirect()->back()->with('duplicate', 'Verify email already sent');
            }
        } else {
            return redirect()->back()->with('error', 'Incorrect email');
        }
    }
}
