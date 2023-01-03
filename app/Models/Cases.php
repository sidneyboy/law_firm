<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'title',
        'category_id',
        'nature_of_case_id',
        'case_description',
        'decision',
        'remarks',
        'user_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Categories', 'category_id');
    }

    public function nature_of_case()
    {
        return $this->belongsTo('App\Models\Nature_of_case', 'nature_of_case_id');
    }

    public function cases_details()
    {
        return $this->hasMany('App\Models\Cases_details', 'cases_id');
    }
}
