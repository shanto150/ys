<?php

namespace App\Models\emp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emps extends Model
{
    use HasFactory;

    protected $fillable = ['role', 'pass', 'email', 'name', 'desig', 'fathers_name', 'mothers_name', 'home_distrit', 'machine_id', 'dob', 'doj', 'nid', 'blood_group', 'religion', 'gender', 'emp_type', 'Mobile_personal', 'Mobile_official', 'salary', 'status', 'present_address', 'permanent_address', 'image_path'];
}
