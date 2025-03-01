<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Password;
use Illuminate\Http\Request;
use Str;

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

    public $token;

    public function __construct(){
        // $this->middleware('guest'); 
    }

    public function sendResetLinkEmail(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with('success', 'Consulter votre boite mail pour naviguer vers le lien de reinitialisation de mot de passe')
                    : back()->withErrors(['email' => 'Utilisateur non trouvé']);
    }

    public function toMail($notifiable){
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
                    ->subject('Reinitialisation du mot de passe')
                    ->line('Vous recevez cet email car nous avons recu une demande de reinitialisation de votre mot de passe.')
                    ->action('Reinitialisez votre mot de passe', $url)
                    ->line('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')])
                    ->line("Si vous n'avez pas demande de reinitialisation, aucune action n'est requise.");
    }
        
}
