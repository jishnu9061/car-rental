<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table='user_message';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'url',
        'message',
    ];
}
