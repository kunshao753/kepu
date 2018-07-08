<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'name', 'mobile','email',
        'question', 'description'
    ];
    protected $table = 'message_board';
}
