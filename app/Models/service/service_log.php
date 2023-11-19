<?php

namespace App\Models\service;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_log extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    protected $fillable = ['rsm_area','asm_area', 'assigned_date', 'assigned_to', 'brand', 'close_date', 'complain_by', 'complains', 'db_name', 'failure_analysis', 'first_response_date', 'job_description', 'log_date', 'outlet_address', 'outlet_code', 'outlet_mobile', 'outlet_name', 'pending_reason', 'person_mobile', 'pulled_delivered', 'region', 'remarks', 'required_day', 'se_area', 'status', 'vendor', 'visi_id', 'visi_size'];
}
