<?php

namespace App\Http\Controllers\emp;

use App\Models\User;
use App\Models\emp\emps;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EmpsController extends Controller
{
    public function index()
    {
        return view('emp.emp');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $rowId = $request->input('id');

        $emps = emps::where(['id' => $rowId]);

        if ($emps->exists()) {
            if ($request->hasFile('CropImage')) {
                $emps = emps::find($rowId);
                if ($emps->image_path) {
                    $filePath = public_path() . $emps->image_path;
                    File::delete($filePath);
                }

                $request_image = $request->file('CropImage');
                $image_name = str_replace(' ', '', (now()->format('dmY-') . time())) . '.' . $request_image->extension();

                $image_path = public_path('/res/images/ProImage/');
                if (!File::exists($image_path)) {
                    File::makeDirectory($image_path);
                }

                $request_image->move($image_path, $image_name);

                emps::where('id', $rowId)->update(
                    [
                        'name' => $request->name,
                        'email' => $request->email,
                        'desig' => $request->desig,
                        'role' => $request->role,
                        'fathers_name' => $request->fathers_name,
                        'mothers_name' => $request->mothers_name,
                        'home_distrit' => $request->home_distrit,
                        'dob' => $request->dob,
                        'doj' => $request->doj,
                        'nid' => $request->nid,
                        'blood_group' => $request->blood_group,
                        'religion' => $request->religion,
                        'gender' => $request->gender,
                        'emp_type' => $request->emp_type,
                        'Mobile_personal' => $request->Mobile_personal,
                        'Mobile_official' => $request->Mobile_official,
                        'salary' => $request->salary,
                        'status' => $request->status,
                        'present_address' => $request->present_address,
                        'permanent_address' => $request->permanent_address,
                        'image_path' => '/res/images/ProImage/' . $image_name,

                    ]
                );

                return response()->json(['messege' => 'Successfully Updated.', 'types' => 's']);
            } else {
                emps::where('id', $rowId)->update(
                    [
                        'name' => $request->name,
                        'email' => $request->email,
                        'role' => $request->role,
                        'desig' => $request->desig,
                        'fathers_name' => $request->fathers_name,
                        'mothers_name' => $request->mothers_name,
                        'home_distrit' => $request->home_distrit,
                        'dob' => $request->dob,
                        'doj' => $request->doj,
                        'nid' => $request->nid,
                        'blood_group' => $request->blood_group,
                        'religion' => $request->religion,
                        'gender' => $request->gender,
                        'emp_type' => $request->emp_type,
                        'Mobile_personal' => $request->Mobile_personal,
                        'Mobile_official' => $request->Mobile_official,
                        'salary' => $request->salary,
                        'status' => $request->status,
                        'present_address' => $request->present_address,
                        'permanent_address' => $request->permanent_address,
                    ]
                );

                return response()->json(['messege' => 'Successfully Updated.', 'types' => 's']);
            }
        } else {
            if ($request->hasFile('CropImage')) {
                $request_image = $request->file('CropImage');
                $image_name = str_replace(' ', '', (now()->format('dmY-') . time())) . '.' . $request_image->extension();

                $image_path = public_path('/res/images/ProImage/');
                if (!File::exists($image_path)) {
                    File::makeDirectory($image_path);
                }

                $request_image->move($image_path, $image_name);
                $request->merge(['image_path' => '/res/images/ProImage/' . $image_name, 'pass' => Hash::make(1234)]);
                emps::create($request->all());

                return response()->json(['messege' => 'Successfully Saved.', 'types' => 's']);
            } else {
                $request->merge(['pass' => Hash::make(1234)]);
                emps::create($request->all());

                return response()->json(['messege' => 'Successfully Saved.', 'types' => 's']);
            }
        }
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = emps::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function updateEmpStatus(Request $request)
    {
        $rowId = $request->input('rowId');
        $Status_value = $request->input('Status_value');
        emps::find($rowId)->update(['status' => $Status_value]);

        return response()->json(['messege' => 'Update Success.', 'types' => 's']);
    }

    public function destroy(Request $request)
    {
        $del_id = $request->del_id;

        $add_shift = emps::find($del_id);
        if ($add_shift->delete()) {
            return response()->json(['messege' => 'Successfully Deleted.', 'types' => 's']);
        } else {
            return response()->json(['messege' => 'Somethings Wrong.', 'types' => 'e']);
        }
    }

    public function contacts(Request $request)
    {
        $emps = emps::latest()->get();

        return view('emp.contact', compact('emps'));
    }

    public function index_cp(Request $request)
    {
        $emps = emps::latest()->get();

        return view('emp.cp', compact('emps'));
    }

    public function change_pass(Request $request)
    {
        User::where('machine_id', $request->emp_id)->update(
            [
                'password' => Hash::make($request->pass),
            ]
        );


        if ($request->emp_id == Auth::user()->machine_id) {
            auth()->logout();
            Session::flush();
            return redirect()->to('/login');
        }else{

            return response()->json(['messege' => 'Password Change Successfully', 'types' => 's']);
        }

    }
}
