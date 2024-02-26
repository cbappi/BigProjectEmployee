<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobpulse extends Model
{
    protected $fillable = ['firstName','lastName','role','email','mobile','password','otp'];
    protected $attributes = [
        'otp' => '0'
    ];

    use HasFactory;
}
