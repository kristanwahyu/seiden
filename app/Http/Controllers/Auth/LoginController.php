<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    protected function authenticated($request, $user)
    {
        if($user->dipa_jenisUser == '1' || $user->dipa_jenisUser == '9' ) {
            return redirect()->intended('/dashboard-admin');
        } elseif ($user->dipa_jenisUser == '2') {
            return redirect()->intended('/kpa');
        } elseif ($user->dipa_jenisUser == '3') {
            return redirect()->intended('/ppk');
        } elseif ($user->dipa_jenisUser == '4') {
            return redirect()->intended('/satker');
        } elseif ($user->dipa_jenisUser == '5') {
            return redirect()->intended('/ppsm');
        } elseif ($user->dipa_jenisUser == '6') {
            return redirect()->intended('/sima'); 
        } elseif ($user->dipa_jenisUser == '7') {
            return redirect()->intended('/siba');
        } else {
            return redirect()->intended('/bendahara');
        }
    }
}
