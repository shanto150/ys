<?php

namespace App\Http\Controllers\technician;

use App\Http\Controllers\Controller;
use App\Models\Price_list;
use App\Models\service\service_log;
use App\Models\technician_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;

class technician_feedback extends Controller
{
    public function index()
    {
        $techDatas = DB::select('select at2.id,at2.log_id,concat(sl.outlet_name," - ",sl.complains," - ",at2.note) note, from_user, at2.created_at 
        from add_technicians at2, technician_items ti, service_logs sl  
        where at2.log_id =sl.id and at2.id =ti.add_techni_id_fk and ti.to_user=? and at2.tech_status ="Open"', [Auth::user()->machine_id]);

        $Price_lists = Price_list::where('status', 'Yes')->latest()->get();

        return view('services.technician.technician_feedback', compact('techDatas', 'Price_lists'));
    }

    public function getLogdetails(Request $request)
    {
        $data = service_log::where('id', $request->slog_id)->select('outlet_code', 'outlet_name', 'outlet_mobile', 'person_mobile', 'outlet_address', 'visi_id', 'visi_size', 'db_name', 'se_area', 'asm_area', 'complains')->get();

        return response()->json(['suggestion' => $data]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $rowId = $request->input('id');

        $technician_item = technician_item::where(['id' => $rowId]);

        if ($technician_item->exists()) {
            if ($request->hasFile('f_path')) {
                $technician_item = technician_item::find($rowId);
                if ($technician_item->file_path) {
                    $filePath = public_path().$technician_item->file_path;
                    File::delete($filePath);
                }

                $request_image = $request->file('f_path');
                $image = Image::make($request_image);
                $image_path = public_path('/res/images/timage/');
                if (! File::exists($image_path)) {
                    File::makeDirectory($image_path);
                }
                $image_name = str_replace(' ', '', (now()->format('dmY-').time())).'.'.$request_image->extension();
                $image->resize(null, 512, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->save($image_path.$image_name);

                technician_item::where('id', $rowId)->update(
                    [
                        'to_user' => $request->to_user,
                        'invoice_item_id' => $request->invoice_item_id,
                        'note' => $request->note,
                        'quantity' => $request->quantity,
                        'request_type' => $request->request_type,
                        'unit' => $request->unit,
                        'file_path' => 'res/images/timage/'.$image_name,

                    ]
                );

                return response()->json(['messege' => 'Successfully Updated.', 'types' => 's']);
            } else {
                technician_item::where('id', $rowId)->update(
                    [
                        'to_user' => $request->to_user,
                        'invoice_item_id' => $request->invoice_item_id,
                        'note' => $request->note,
                        'quantity' => $request->quantity,
                        'request_type' => $request->request_type,
                        'unit' => $request->unit,
                    ]
                );

                return response()->json(['messege' => 'Successfully Updated.', 'types' => 's']);
            }
        } else {
            if ($request->hasFile('f_path')) {
                $request_image = $request->file('f_path');
                $image = Image::make($request_image);
                $image_path = public_path('/res/images/timage/');
                if (! File::exists($image_path)) {
                    File::makeDirectory($image_path);
                }
                $image_name = str_replace(' ', '', (now()->format('dmY-').time())).'.'.$request_image->extension();

                $image->resize(null, 512, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->save($image_path.$image_name);
                $fpath = 'res/images/timage/'.$image_name;
                $request->merge(['file_path' => $fpath]);
                technician_item::create($request->all());

                return response()->json(['messege' => 'Successfully Saved.', 'types' => 's']);
            } else {
                technician_item::create($request->all());

                return response()->json(['messege' => 'Successfully Saved.', 'types' => 's']);
            }
        }
    }

    public function getfeedbackist(Request $request)
    {
        $data = technician_item::where('log_id', $request->log_id)
        ->where('from_user', Auth::user()->machine_id)
        ->selectRaw('concat(Quantity," ",unit," ",f_invoice_item_name(invoice_item_id)," ",f_req_type_bn(request_type)) as item,log_id,id,request_type,invoice_item_id,quantity,unit,note,to_user')
        ->get();


        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
