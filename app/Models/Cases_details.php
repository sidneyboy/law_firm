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
        'nature_of_hearing',
        'time_of_hearing',
        'date_of_hearing',
        'plea',
        'remarks',
    ];

    public function attachments()
    {
        return $this->hasMany('App\Models\Case_details_attachments', 'case_details_id');
    }
}
