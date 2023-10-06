<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class technician_item extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    protected $fillable = ['to_user', 'from_user', 'add_techni_id_fk', 'file_path', 'invoice_item_id', 'log_id', 'note', 'quantity', 'request_type', 'unit'];
}
