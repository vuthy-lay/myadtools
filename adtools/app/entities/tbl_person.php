<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class tbl_person extends Model
{
    protected $table = 'tbl_person';
    protected $fillable = array('seq', 'per_code', 'per_surname_kh', 'per_name_kh', 'per_surname_en', 'per_name_en',
    'per_sex', 'per_dob', 'per_nationality', 'per_pob', 'per_current_address', 'per_phone_number', 'per_email', 'per_photo',
    'per_language', 'per_father_name', 'per_father_status', 'per_father_dob', 'per_father_job', 'per_father_job_orgname',
    'per_mother_name', 'per_mother_status', 'per_mother_dob', 'per_mother_job', 'per_mother_job_orgname',
    'per_children_number', 'per_sibling_member', 'per_sibling_female', 'per_sibling_male', 'per_sibling_rank', 'record_stat');
}
