<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class Letter_In extends Model
{
    //
    protected $table = 'letter_in';
    protected $fillable = array('letter_code', 'letter_subject', 'letter_priority', 'letter_char', 'letter_date', 'letter_type', 'letter_source', 'letter_target', 'letter_discription', 'record_stat');
}
