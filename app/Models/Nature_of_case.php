<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nature_of_case extends Model
{
    use HasFactory;

    protected $fillable = [
        'nature_of_case',
        'user_id'
    ];
}
