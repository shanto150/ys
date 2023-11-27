<?php

namespace App\Http\Controllers\pre_invoice;

use Exception;
use Carbon\Carbon;
use App\Models\Price_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\pre_invoice\pre_invoice;
use App\Models\service\service_log;

class PreInvoiceController extends Controller {

    public function index( $id,$visi_id ) {

        $service_logs = DB::table( 'service_logs' )
        ->where( 'id', '=', $id )
        ->first();

        $attachs = DB::table('technician_items')->where( 'add_techni_id_fk', '=', $id )->whereNotNull('file_path')->select('file_path')->get();

        $dateS = Carbon::now()->startOfMonth()->subMonth( 3 );
        $dateE = Carbon::now();
        $last3monthvalue = DB::table( 'pre_invoices as pi' )
        ->join('service_logs as sl','sl.id','=','pi.log_id')
        ->selectRaw( "date_format(pi.invoice_month,'%b-%Y') inv_date,f_invoice_item_name(pi.invoice_item_id) item_name,pi.quantity ,pi.rate,note,sl.outlet_code" )
        ->where( 'pi.visi_id',$visi_id )
        ->whereBetween('pi.invoice_month',[$dateS,$dateE])
        ->get();

        // dd($last3monthvalue);

        $log_id =  $id;

        $Price_lists = Price_list::where( 'status', 'Yes' )->latest()->get();

        $invs_items = DB::select( 'select date_format(now(),"%Y-%m-%d") dt,invoice_item_id,quantity,ti.unit,pl.price,(quantity*pl.price) total,pl.name
        from technician_items ti, price_lists pl where ti.invoice_item_id =pl.id and request_type = "Install" and log_id = ?
        union all
        select date_format(now(),"%Y-%m-%d") dt,48,1,"Trip",500,500,"Service Charge" from dual', [  $id ] );

        // dd( json_encode( $invs_items ) );
        $inv_items = json_encode( $invs_items );

        return view( 'prepare_invoice.pre_invoice', compact( 'attachs','service_logs', 'Price_lists', 'inv_items', 'log_id','last3monthvalue' ) );
    }

    public function store( Request $request ) {

        // dd( $request->all() );

        $input = $request->all();

        if ( count( $input[ 'sl' ] ) > 0 ) {
            for ( $i = 0 ; $i < count( $input[ 'sl' ] )  ;
            $i++ ) {
                try {
                    $pre_i = new pre_invoice();
                    $pre_i->log_id = $input[ 'log_id' ];
                    $pre_i->visi_id = $input[ 'visi_id' ];
                    $pre_i->sl = $input[ 'sl' ][ $i ];
                    $pre_i->invoice_month = Carbon::parse( $input[ 'invoice_month' ][ $i ] )->format( 'Y-m-d' );
                    $pre_i->invoice_item_id = $input[ 'invoice_item_id' ][ $i ];
                    $pre_i->quantity =  $input[ 'quantity' ][ $i ];
                    $pre_i->unit = $input[ 'unit' ][ $i ];
                    $pre_i->rate =  $input[ 'rate' ][ $i ];
                    $pre_i->total_amount = $input[ 'total_amount' ][ $i ];
                    $pre_i->note =  $input[ 'note' ][ $i ];
                    $pre_i->willbill =  $input[ 'willbill' ][ $i ];
                    $issave=$pre_i->save();
                    if ($issave) {
                        service_log::where( 'id', $input[ 'log_id' ] )->update(
                            [
                                'pre_invoice_status' => 'Yes',
                            ]
                        );
                    }
                    

                } catch( Exception $e ) {
                    if ($e->getMessage()=='') {
                        return response()->json( [ 'messege' => 'Invoice Saved', 'types' => 's' ] );
                    }
                    return response()->json( [ 'messege' => $e->getMessage(), 'types' => 'e' ] );
                }

            }
        }

    }

}
