<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class tbl_person_child extends Model
{
    protected $table = 'tbl_person_child';
    protected $fillable = array('seq', 'per_code', 'per_child_name', 'per_child_sex', 'per_child_dob', 'per_child_job', 'record_stat');
}
