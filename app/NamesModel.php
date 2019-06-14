<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NamesModel extends Model
{
    protected $fillable = [
        'question_id',
        'user',
        'user_role',
        'message',
    ];
}
