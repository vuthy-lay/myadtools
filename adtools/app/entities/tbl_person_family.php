<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class tbl_person_family extends Model
{
    protected $table = 'tbl_person_family';
    protected $fillable = array('seq', 'per_code', 'per_family_name', 'per_family_status', 'per_family_dob', 'per_family_job', 'per_family_org_name', 'per_family_job_orgname', 'per_family_type',
     'record_stat');
}
