<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class Letter_Out extends Model
{
    //
    protected $table = 'letter_out';
    protected $fillable = array('letter_code', 'letter_subject', 'letter_priority', 'letter_char', 'letter_date', 'letter_type', 'letter_distination', 'letter_discription', 'record_stat');
}
