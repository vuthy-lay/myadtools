<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class tbl_person_sibling extends Model
{
    protected $table = 'tbl_person_sibling';
    protected $fillable = array('seq', 'per_code', 'per_sibling_name', 'per_sibling_sex', 'per_sibling_dob', 'per_sibling_job', 'record_stat');
}
