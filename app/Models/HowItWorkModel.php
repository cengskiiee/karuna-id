<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;


class HowItWorkModel extends Model
{
    use HasFactory;
    use Translatable;


    protected $table = 'tb_about_how_it_work';

    protected $fillable = ['id_title', 'id_description', 'en_title', 'en_description'];

    public $incrementing = false;
    protected $primaryKey = null; 
    public $timestamps = true;


}
