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
        switch ($user->dipa_jenis_pengguna) {
            case "1":
                return redirect()->intended('/dashboard');
                break;
            case "2":
                return redirect()->intended('/kpa');
                break;
            case "3":
                return redirect()->intended('/dashboard-ppk');
                break;
            case "4":
                return redirect()->intended('/dashboard-satker');
                break;
            case "5":
                return redirect()->intended('/ppsm');
                break;
            case "6":
                return redirect()->intended('/sima');
                break;
            case "7":
                return redirect()->intended('/siba');
                break;
            default:
                return redirect()->intended('/bendahara');
        }
    }
}
