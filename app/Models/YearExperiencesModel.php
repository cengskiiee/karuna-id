<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearExperiencesModel extends Model
{
    use HasFactory;
    protected $table = 'tb_about_years_experience';

    protected $fillable = ['years_experience','projects_completed', 'satisfied_client', 'total_rating', 'en_description'];

    public $incrementing = false;
    protected $primaryKey = null; 
    public $timestamps = true;
}

