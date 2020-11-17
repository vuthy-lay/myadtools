<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class tbl_staff extends Model
{
    protected $table = 'tbl_staff';
    protected $fillable = array('per_code', 'staff_code', 'per_current_salary_level', 'record_stat');
}
