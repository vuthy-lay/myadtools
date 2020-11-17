<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class Udtm_Lov extends Model
{
    //
    protected $table = 'udtm_lov';
    protected $fillable = array('lov_type', 'lov_code', 'lov_desc', 'lov_desc_kh', 'lov_text', 'record_stat',);
}
