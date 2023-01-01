<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases_details extends Model
{
    use HasFactory;

    protected $fillable = [
        'cases_id',
        'appointment_hearing_date',
        'description',
        'remarks',
    ];

    public function attachments()
    {
        return $this->hasMany('App\Models\Case_details_attachments', 'case_details_id');
    }
}
