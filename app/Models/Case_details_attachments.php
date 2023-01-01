<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Case_details_attachments extends Model
{
    use HasFactory;

    protected $fillable = [
        'attachment_name',
        'case_details_id',
        'type'
    ];
}
