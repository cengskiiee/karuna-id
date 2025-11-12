<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;

class WhyUsModel extends Model
{
    use HasFactory;
    use Translatable;

    

    protected $table = 'tb_about_why_choose_us';

    protected $fillable = ['id_title', 'id_description', 'en_title', 'en_description', 'image_why_1', 'image_why_2'];

    public $incrementing = false;
    protected $primaryKey = null;
    public $timestamps = true;
}
