<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;



class Admin extends Model implements AuthenticatableContract
{
    use Authenticatable,HasFactory;
    protected $table='admin';
    protected $primaryKey='admin_id';
    protected $guarded= [];
}
