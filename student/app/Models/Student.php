<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Auth;

class Student extends Auth
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'student_id', 
        'password', 
        'course', 
        'college', 
        'email', 
        'phone_number'
    ];

    protected $hidden = ['password'];
}
