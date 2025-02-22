<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RedirectsUsers; 
use Illuminate\Auth\Events\Verified; 
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request; 
use App\Models\User; 

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails, RedirectsUsers;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('signed')->only('verify');
    //     $this->middleware('throttle:6,1')->only('verify', 'resend');
    // }

    public function notice(){
        return view('pages.auth.verify_email'); 
    }

    public function show(Request $request){
        if($request->user()->hasVerifiedEmail()){
            return redirect($this->redirectPath()); 
        }
        return view('pages.auth.verify_email'); 
    }

    public function verify(EmailVerificationRequest $request){
        $user = $request->user(); 

        if($request->route('id') != $user->getKey()){
            return redirect($this->redirectPath())->with('error', ' Lien invalide'); 
        }

        if(!$user->hasVerifiedEmail()){
            $user->markEmailAsVerified();
            event(new Verified($user)); 
        }
        // $request->fulfill();

        return redirect('')->with('success', 'Email de validation verifie'); 
    }

    public function resend(Request $request){
        if($request->user()->hasVerifiedEmail()){
            return redirect('')->with('success', 'Email deja verifie'); 
        }

        $request->user()->sendEmailVerificationNotification(); 

        return back()->with('success', 'Un nouveau lien de validation a ete envoye'); 
    }
}
