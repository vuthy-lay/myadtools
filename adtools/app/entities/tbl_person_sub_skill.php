<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class tbl_person_sub_skill extends Model
{
    protected $table = 'tbl_person_sub_skill';
    protected $fillable = array('seq', 'per_code', 'per_sub_skill_name', 'per_sub_skill_date', 'record_stat');
}
