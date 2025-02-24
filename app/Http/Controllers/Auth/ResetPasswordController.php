<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Password;
use Illuminate\Http\Request;
use Str;

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
    protected $redirectTo = '/';

    public function showResetForm(Request $request, $token = null){
        return view('pages.auth.password_forgotten')->with(['token' => $token, 'email' => $request->email]); 
    }

    public function reset(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]); 

        $status = Password::reset(
            $request->only(['email', 'password', 'password_confirmation', 'token']),
            function ($user, $password){
                $user->forceFill([
                    'password' =>  Hash::make($password)
                ])->save(); 

                $user->setRememberToken(Str::random(60));

                event(new PasswordReset($user)); 
            }
        ); 

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('success', "Votre mot de passe a ete reinitialise")
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
