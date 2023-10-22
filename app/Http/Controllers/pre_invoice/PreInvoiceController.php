<?php

namespace App\Http\Controllers\pre_invoice;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Price_list;

class PreInvoiceController extends Controller {

    public function index( Request $request ) {

        $service_logs = DB::table( 'service_logs' )
        ->where( 'id', '=', $request->id )
        ->first();

        $Price_lists = Price_list::where( 'status', 'Yes' )->latest()->get();

        $invs_items = DB::select( 'select date_format(now(),"%Y-%m-%d") dt,invoice_item_id,quantity,ti.unit,pl.price,(quantity*pl.price) total,pl.name
        from technician_items ti, price_lists pl where ti.invoice_item_id =pl.id and request_type = "Install" and log_id = ?
        union all
        select date_format(now(),"%Y-%m-%d") dt,48,1,"Trip",500,500,"Service Charge" from dual', [ $request->id ] );

        // dd( json_encode( $invs_items ) );
        $inv_items = json_encode( $invs_items );

        return view( 'prepare_invoice.pre_invoice', compact( 'service_logs', 'Price_lists', 'inv_items' ) );
    }

    public function store( Request $request ) {
        $rowId = $request->id;

        dd($request->all());

        // $emps = service_log::where( [ 'id' => $rowId ] );

        // if ( $emps->exists() ) {
        //     service_log::where( 'id', $rowId )->update(
        //         [
        //             'outlet_code' => $request->outlet_code,
        //             'outlet_name' => $request->outlet_name,
        //             'outlet_mobile' => $request->outlet_mobile,
        //             'person_mobile' => $request->person_mobile,
        //             'outlet_address' => $request->outlet_address,
        //             'visi_id' => $request->visi_id,
        //             'visi_size' => $request->visi_size,
        //             'db_name' => $request->db_name,
        //             'se_area' => $request->se_area,
        //             'asm_area' => $request->asm_area,
        //             'complains' => $request->complains,
        //             'log_date' => $request->log_date,
        //             'first_response_date' => $request->first_response_date,
        //             'assigned_to' => $request->assigned_to,
        //             'assigned_date' => $request->first_response_date,
        //             'brand' => $request->brand,
        //             'status' => $request->status,
        //             'remarks' => $request->remarks,

        //         ]
        //     );

        //     return response()->json( [ 'messege' => 'Successfully Updated.', 'types' => 's' ] );
        // } else {
        //     service_log::create( $request->all() );

        //     return response()->json( [ 'messege' => 'Successfully Saved.', 'types' => 's' ] );
        // }
    }


}
