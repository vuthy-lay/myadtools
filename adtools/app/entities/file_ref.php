<?php

namespace App\entities;

use Illuminate\Database\Eloquent\Model;

class file_ref extends Model
{
    protected $table = 'file_ref';
    protected $fillable = array('letter_code', 'attachment_name', 'letter_attachment');
}
