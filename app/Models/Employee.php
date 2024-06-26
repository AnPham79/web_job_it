<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
        'role'
    ];

    public function company()
    {
        return $this->belongsTo((Company::class));
    }

    public function getGender()
    {
        return ($this->gender == 0) ? 'Male' : 'Female';
    }

    protected $table = 'employees';
}
