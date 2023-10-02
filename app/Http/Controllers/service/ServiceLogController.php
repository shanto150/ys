<?php

namespace App\Http\Controllers\service;

use App\Http\Controllers\Controller;
use App\Models\service\add_technician;
use App\Models\service\service_log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ServiceLogController extends Controller
{
    public function FirstCall()
    {
        return view('services.first_entry');
    }

    public function TechAdd(Request $request)
    {
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
        if ($request->ajax()) {
            $data = service_log::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
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

        if ($add_technician->exists()) {
            add_technician::where('id', $rowId)->update(
                [
                    'assigned_to' => $request->assigned_to,
                    'tech_status' => $request->tech_status,
                    'note' => $request->note,
                ]
            );

            return response()->json(['messege' => 'Successfully Updated.', 'types' => 's']);
        } else {
            add_technician::create($request->all());

            return response()->json(['messege' => 'Successfully Saved.', 'types' => 's']);
        }
    }

    public function getTechList(Request $request)
    {
        if ($request->ajax()) {
            // $data = add_technician::where('log_id', $request->log_id)
            //     ->selectRaw('id,log_id,f_staff_name(assigned_to) as tech_name,note,assigned_to,tech_status')
            //     ->orderByDesc('id')
            //     ->get();

            $data = DB::select('select id,log_id,f_staff_name(assigned_to) tech_name,note,tech_status,assigned_to from add_technicians where log_id=?
            union all
            select "","",f_staff_name(assigned_to) staff,concat(Quantity," ",unit," ",f_invoice_item_name(invoice_item_id)," ",f_req_type_bn(request_type)) as item,file_path,"" from technician_items where log_id=?', [$request->log_id, $request->log_id]);

            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }
}
