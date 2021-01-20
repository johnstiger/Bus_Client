<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
    use HasApiTokens,HasFactory;
    protected $table = 'client';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'contact_number',
        'address',
        'username',
        'password'
    ];
    protected $hidden =[
        'password'
    ];
}
