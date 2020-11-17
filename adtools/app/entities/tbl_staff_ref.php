<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class tbl_staff_ref extends Model
{
    protected $table = 'tbl_staff_ref';
    protected $fillable = array('staff_code', 'file_name', 'file_ref', 'record_stat');
}
