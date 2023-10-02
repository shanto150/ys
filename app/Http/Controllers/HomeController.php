<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role == 'Technician') {
            return view('home.thome');
        } else {
            return view('home.home');
        }
        // dd(Auth::user()->name);
    }

    public function test()
    {
        $notify = [
            'messege' => 'সেভ হইনি !',
            'alert-type' => 'e',
        ];
        // Session::flash('message', 'This is a message!');
        // Session::flash('alert-type', 'e');
        $car_jobs = [];
        // dd($notify);
        return view('test', compact('car_jobs'))->with('message', 'Profile updated!');
    }

    public function gal()
    {
        $car_jobs = [];

        return view('gal', compact('car_jobs'));
    }

    public function getedate(Request $request)
    {
        $REG_NO = $request->input('REG_NO');
        if ($REG_NO == '') {
            $notify = ['messege' => 'সেভ হয়েছে !', 'alert-type' => 'e'];

            return back()->with($notify);
        }
    }

    public function lout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
