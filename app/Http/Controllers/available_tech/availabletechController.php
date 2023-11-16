<?php

namespace App\Http\Controllers\available_tech;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class availabletechController extends Controller
{
    public function index(Request $request)
    {

        $ttl_tech = DB::table('emps')->where('role', 'Technician')->count();
        $results = DB::select('select log_id from service_logs sl,add_technicians at2 where status ="Assigned" and sl.id =at2.log_id and at2.tech_status ="Open" group by log_id');
        $ttl_inmarket = count($results);
        $free = $ttl_tech - $ttl_inmarket;

        $techs = DB::select("select e.machine_id,name,CONCAT(FLOOR((TIMESTAMPDIFF(MONTH, dob, CURDATE()) / 12)), 'Y ', MOD(TIMESTAMPDIFF(MONTH, dob, CURDATE()), 12) , 'M' ) AS age,
        CONCAT(FLOOR((TIMESTAMPDIFF(MONTH, doj, CURDATE()) / 12)), 'Y ', MOD(TIMESTAMPDIFF(MONTH, doj, CURDATE()), 12) , 'M' ) AS job_age,concat(Mobile_personal,' ',Mobile_official) contact  
        from emps e where role ='Technician'");

        return view('available_tech.availabletech', compact('ttl_tech', 'ttl_inmarket', 'free', 'techs'));
    }

    public function getFilterTechData(Request $request)
    {

        if ($request->filterType == 'ALL') {

            $ttl_tech = DB::table('emps')->where('role', 'Technician')->selectRaw('machine_id,name,CONCAT(FLOOR((TIMESTAMPDIFF(MONTH, dob, CURDATE()) / 12)), "Y ", MOD(TIMESTAMPDIFF(MONTH, dob, CURDATE()), 12) , "M" ) AS age,
            CONCAT(FLOOR((TIMESTAMPDIFF(MONTH, doj, CURDATE()) / 12)), "Y ", MOD(TIMESTAMPDIFF(MONTH, doj, CURDATE()), 12) , "M" ) AS job_age,concat(Mobile_personal," ",Mobile_official) contact')->get();

            return DataTables::of($ttl_tech)->addIndexColumn()->make(true);

        } elseif ($request->filterType == 'MARKET') 
        {
            $inMarket = DB::table('emps as e')
                ->selectRaw('e.machine_id,name,CONCAT(FLOOR((TIMESTAMPDIFF(MONTH, dob, CURDATE()) / 12)), "Y ", MOD(TIMESTAMPDIFF(MONTH, dob, CURDATE()), 12) , "M" ) AS age,CONCAT(FLOOR((TIMESTAMPDIFF(MONTH, doj, CURDATE()) / 12)), "Y ", MOD(TIMESTAMPDIFF(MONTH, doj, CURDATE()), 12) , "M" ) AS job_age,concat(Mobile_personal," ",Mobile_official) contact')
                ->join('add_technicians as at2', 'e.machine_id', '=', 'at2.assigned_to')
                ->where('at2.tech_status', 'Open')->get();

            return DataTables::of($inMarket)->addIndexColumn()->make(true);

        }else{

            $free = DB::select('select machine_id,name,CONCAT(FLOOR((TIMESTAMPDIFF(MONTH, dob, CURDATE()) / 12)), "Y ", MOD(TIMESTAMPDIFF(MONTH, dob, CURDATE()), 12) , "M" ) AS age,
            CONCAT(FLOOR((TIMESTAMPDIFF(MONTH, doj, CURDATE()) / 12)), "Y ", MOD(TIMESTAMPDIFF(MONTH, doj, CURDATE()), 12) , "M" ) AS job_age,
            concat(Mobile_personal," ",Mobile_official) contact from emps e where e.role ="Technician"
            EXCEPT
            select machine_id,name,CONCAT(FLOOR((TIMESTAMPDIFF(MONTH, dob, CURDATE()) / 12)), "Y ", MOD(TIMESTAMPDIFF(MONTH, dob, CURDATE()), 12) , "M" ) AS age,
            CONCAT(FLOOR((TIMESTAMPDIFF(MONTH, doj, CURDATE()) / 12)), "Y ", MOD(TIMESTAMPDIFF(MONTH, doj, CURDATE()), 12) , "M" ) AS job_age,
            concat(Mobile_personal," ",Mobile_official) contact from emps e , add_technicians at2 where e.machine_id =at2.assigned_to and at2.tech_status ="Open"');
            return DataTables::of($free)->addIndexColumn()->make(true);
        }

        
    }
}
