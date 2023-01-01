<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'category_id',
        'nature_of_case_id',
        'case_description',
        'decision',
        'remarks',
        'user_id',
    ];
}
