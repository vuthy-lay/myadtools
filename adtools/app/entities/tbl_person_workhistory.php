<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class tbl_person_workhistory extends Model
{
    protected $table = 'tbl_person_workhistory';
    protected $fillable = array('seq', 'per_code', 'per_workhis_date_stat', 'per_workhis_date_finish', 'per_workhis_org_name',
    'per_workhis_dpt_name', 'per_workhis_sub_dpt_name', 'per_workhis_title_name', 'record_stat');
}
