<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class Letter_Det extends Model
{
    //
    protected $table = 'letter_det';
    protected $fillable = array('letter_code', 'letter_subject', 'letter_char', 'letter_date', 'letter_type', 'letter_discription', 'record_stat');
}
