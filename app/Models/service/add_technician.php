<?php

namespace App\Models\service;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class add_technician extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    protected $fillable = ['log_id', 'assigned_to', 'note'];
}
