<?php

namespace App\Http\Controllers\invoice;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->sd == '') {
            $dates = '';
            $invs_items = DB::select('select sl.id,sl.log_date,brand,sl.visi_size,sl.visi_id, sl.outlet_code ,sl.outlet_name,outlet_mobile,db_name,se_area,asm_area,f_invoice_item_name(invoice_item_id) work_item,quantity,rate,total_amount,log_wise_sum(pi2.log_id) ttl,pi2.note
            from service_logs sl,pre_invoices pi2 where sl.id =pi2.log_id and pi2.invoice_month between ? and ?', [$request->sd, $request->ed]);

            $summery = DB::select('select f_invoice_item_name(invoice_item_id) parts,sum(pi2.quantity) Qty,sum(pi2.total_amount) amount 
            from pre_invoices pi2 where pi2.invoice_month between ? and ? group by parts' , [$request->sd, $request->ed]);

            return view('invoice.final_invoice', compact('invs_items', 'dates', 'summery'));
        } else {
            $dates = Carbon::createFromFormat('Y-m-d', $request->sd)->format('Y-M-d') . '~' . Carbon::createFromFormat('Y-m-d', $request->ed)->format('Y-M-d');
            $invs_items = DB::select('select sl.id,sl.log_date,brand,sl.visi_size,sl.visi_id, sl.outlet_code ,sl.outlet_name,outlet_mobile,db_name,se_area,asm_area,f_invoice_item_name(invoice_item_id) work_item,quantity,rate,total_amount,log_wise_sum(pi2.log_id) ttl,pi2.note
            from service_logs sl,pre_invoices pi2 where sl.id =pi2.log_id and pi2.invoice_month between ? and ?', [$request->sd, $request->ed]);

            $summery = DB::select('select f_invoice_item_name(invoice_item_id) parts,sum(pi2.quantity) Qty,sum(pi2.total_amount) amount 
            from pre_invoices pi2 where pi2.invoice_month between ? and ? group by parts', [$request->sd, $request->ed]);

            return view('invoice.final_invoice', compact('invs_items', 'dates', 'summery'));
        }
    }
}
