<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch (Auth::user()->dipa_jenis_pengguna) {
            case "1":
                return redirect()->intended('/dashboard');
                break;
            case "2":
                return redirect()->intended('/dashboard-kpa');
                break;
            case "3":
                return redirect()->intended('/dashboard-ppk');
                break;
            case "4":
                return redirect()->intended('/dashboard-satker');
                break;
            case "5":
                return redirect()->intended('/dashboard-ppspm');
                break;
            case "6":
                return redirect()->intended('/dashboard-simak');
                break;
            case "7":
                return redirect()->intended('/dashboard-saiba');
                break;
            case "8":
                return redirect()->intended('/dashboard-perlengkapan');
                break;
            default:
                return redirect()->intended('/dashboard-bendahara');
        }
    }
}
