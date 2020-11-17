<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class tbl_staff_medal extends Model
{
    protected $table = 'tbl_staff_medal';
    protected $fillable = array('per_code', 'staff_code', 'staff_medal_tittle', 'staff_medal_date', 'staff_medal_para', 'record_stat');
}
