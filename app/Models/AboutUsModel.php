<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;


class AboutUsModel extends Model
{
    use HasFactory;
    use Translatable;


    protected $table = 'tb_about_about_us';

    protected $fillable = ['id_title', 'id_description', 'en_title', 'en_description', 'link_video', 'image_1', 'image_2', 'image_bg'];

    public $incrementing = false;
    protected $primaryKey = null;
    public $timestamps = true;

}
