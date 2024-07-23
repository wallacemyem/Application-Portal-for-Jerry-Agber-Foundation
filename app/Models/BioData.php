<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BioData extends Model
{
    use HasFactory;

    protected $table = 'bio_data';

    protected $fillable = [
        'surname',
        'first_name',
        'other_name',
        'phone',
        'course_of_study',
        'council_ward',
        'facebook_profile',
        'linkedin_profile',
        'x_profile',
        'cv_file_path',
        'id_file_path',
        'lgco_file_path',
        'user_id',
        'type',
        'status',
        'photo',
    ];
}
