<?php

namespace App\Models\pre_invoice;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pre_invoice extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    protected $fillable = ['willbill','log_id', 'invoice_month', 'invoice_item_id', 'quantity', 'unit', 'rate', 'total_amount', 'note','visi_id'];
}
