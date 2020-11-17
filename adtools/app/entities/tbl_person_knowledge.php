<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class tbl_person_knowledge extends Model
{
    protected $table = 'tbl_person_knowledge';
    protected $fillable = array('seq', 'per_code', 'per_knowledge_level', 'per_knowledge_school_name', 'per_knowledge_school_place',
    'per_knowledge_certificate', 'per_knowledge_date_start', 'per_knowledge_date_finish', 'record_stat');
}
