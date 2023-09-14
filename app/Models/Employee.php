<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'department',
        'gender',
        'phone_number',
        'profile_picture',
    ];

    public function gender() : Attribute
    {
        return new Attribute(
            get: fn ($value) => array_flip(['Male' => 'M', 'Female' => 'F', 'Other' => 'O'])[$value],
            set: fn ($value) => ['Male' => 'M', 'Female' => 'F', 'Other' => 'O'][$value],
        );
    }
}
