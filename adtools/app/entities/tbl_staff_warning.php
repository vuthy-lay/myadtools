<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class tbl_staff_warning extends Model
{
    protected $table = 'tbl_staff_warning';
    protected $fillable = array('seq', 'staff_code', 'staff_code', 'staff_warning_desc', 'record_stat');
}
