<?php

namespace App\Http\Controllers\service;

use App\Http\Controllers\Controller;
use App\Models\service\add_technician;
use App\Models\service\service_log;
use App\Models\technician_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ServiceLogController extends Controller
{
    public function FirstCall()
    {
        $asm = DB::table('service_logs')->distinct()->get(['asm_area']);
        $se = DB::table('service_logs')->distinct()->get(['se_area']);
        // dd($asm);
        return view('services.first_entry',compact('asm','se'));
    }

    public function TechAdd(Request $request) {
        $service_logs = DB::table('service_logs')
            ->where('id', '=', $request->id)
            ->first();

        // dd($service_logs);

        return view('services.addt', compact('service_logs'));
    }

    public function store(Request $request)
    {
        $rowId = $request->id;

        $emps = service_log::where(['id' => $rowId]);

        if ($emps->exists()) {
            service_log::where('id', $rowId)->update(
                [
                    'outlet_code' => $request->outlet_code,
                    'outlet_name' => $request->outlet_name,
                    'outlet_mobile' => $request->outlet_mobile,
                    'person_mobile' => $request->person_mobile,
                    'outlet_address' => $request->outlet_address,
                    'visi_id' => $request->visi_id,
                    'visi_size' => $request->visi_size,
                    'db_name' => $request->db_name,
                    'se_area' => $request->se_area,
                    'asm_area' => $request->asm_area,
                    'complains' => $request->complains,
                    'log_date' => $request->log_date,
                    'first_response_date' => $request->first_response_date,
                    'assigned_to' => $request->assigned_to,
                    'assigned_date' => $request->first_response_date,
                    'brand' => $request->brand,
                    'status' => $request->status,
                    'remarks' => $request->remarks,

                ]
            );

            return response()->json(['messege' => 'Successfully Updated.', 'types' => 's']);
        } else {
            service_log::create($request->all());

            return response()->json(['messege' => 'Successfully Saved.', 'types' => 's']);
        }
    }

    public function getData(Request $request)
    {
        // dd($request->all());

        $dates=explode(',',$request->dateRange);

        $data = DB::table('service_logs')->selectRaw('*')->orderByDesc('id');

        if ($request->Status) {
            $data->where('status', $request->Status);
        }
        if ($request->dateRange) {
            $data->whereBetween('log_date', [$dates[0],$dates[1]]);
        }

        if ($request->SEarea) {
            $data->where('se_area', $request->SEarea);
        }

        if ($request->ASMarea) {
            $data->where('asm_area', $request->ASMarea);
        }

        $data->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function getOutletCode()
    {
        $data = service_log::latest()->select(DB::raw('CAST(outlet_code AS CHAR) AS value'), DB::raw('CAST(outlet_code AS CHAR) AS data'))->get();

        return response()->json(['suggestion' => $data]);
    }

    public function getOutletdetails(Request $request)
    {
        $data = service_log::where('outlet_code', $request->outlet_code)->select('outlet_code', 'outlet_name', 'outlet_mobile', 'person_mobile', 'outlet_address', 'visi_id', 'visi_size', 'db_name', 'se_area', 'asm_area')->get();

        return response()->json(['suggestion' => $data]);
    }

    public function Techstore(Request $request)
    {
        $rowId = $request->id;

        $add_technician = add_technician::where(['id' => $rowId]);
        if ($add_technician->first()) {
            add_technician::where('id', $rowId)->update(
                [
                    'tech_status' => $request->tech_status,
                    'note' => $request->note,
                ]
            );
            $add_technician = technician_item::where('add_techni_id_fk', $rowId)->first();
            $add_technician->note = $request->note;
            $add_technician->to_user = $request->assigned_to ? $request->assigned_to : $add_technician->to_user;
            $add_technician->save();

            return response()->json(['messege' => 'Successfully Updated.', 'types' => 's']);
        } else {
            $isSave = add_technician::create($request->all());

            if ($isSave) {
                $tf = new technician_item;
                $tf->add_techni_id_fk = $isSave->id;
                $tf->log_id = $request->log_id;
                $tf->from_user = Auth::user()->machine_id;
                $tf->to_user = $request->assigned_to;
                $tf->request_type = 'Main';
                $tf->note = $request->note;
                $tf->save();
                service_log::where('id', $request->log_id)->update(['status' =>'Assigned']);
            }

            return response()->json(['messege' => 'Successfully Saved.', 'types' => 's']);
        }
    }

    public function getTechList(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::select('select ti.id,ti.log_id ,concat(f_staff_name( ti.from_user  ),"->",f_staff_name( ti.to_user )) tech_name,ti.note,at2.tech_status,ti.created_at,ti.to_user assigned_to,ti.file_path,ti.add_techni_id_fk
            from add_technicians at2, technician_items ti where at2.id =ti.add_techni_id_fk and at2.log_id =?', [$request->log_id]);

            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }
    public function CloseOpenTask(Request $request)
    {
        $add_technician = add_technician::where('id', $request->add_techni_id_fk)->first();

        if ($request->log_status == 'Open') {
            $add_technician->tech_status = 'Closed';
            $add_technician->save();
            return response()->json(['messege' => 'Successfully Closed', 'types' => 's']);
        } else {
            $add_technician->tech_status = 'Open';
            $add_technician->save();
            return response()->json(['messege' => 'Successfully Open', 'types' => 's']);
        }
    }

    public function FullTaskClose(Request $request)
    {
        add_technician::where('log_id', $request->log_id)->update(['tech_status' => 'Closed']);

        $service_log = service_log::where('id', $request->log_id)->first();
        $service_log->status = 'Closed';
        $service_log->save();

        return response()->json(['messege' => 'Successfully Closed', 'types' => 's']);
    }
}
