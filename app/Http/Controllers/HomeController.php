<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            $Monthly_sell_Months = ['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sep'];
            $Monthly_sell_values = ['372082', '498576', '562726','287465','304847','876535','654387','417266','865242'];
            $statusCount = DB::select('select status,count(id) ctn from service_logs sl group by status');

            $ttl_emp = DB::table('emps')->where('status', 1)->count();
            $ttl_tech = DB::table('emps')->where('role', 'Technician')->count();
            $results = DB::select('select log_id from service_logs sl,add_technicians at2 where status ="Assigned" and sl.id =at2.log_id and at2.tech_status ="Open" group by log_id');
            $ttl_inmarket =count($results);
            $free=$ttl_tech-$ttl_inmarket;
            
            return view('home.home',compact('Monthly_sell_Months', 'Monthly_sell_values','statusCount','ttl_emp','ttl_tech','ttl_inmarket','free'));
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
