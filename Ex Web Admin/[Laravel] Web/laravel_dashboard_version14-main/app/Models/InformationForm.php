<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'sex',
        'image',
        'email',
        'phone',
        'country',
    ];
}
