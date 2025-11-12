<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;


class HomeContentSliderModel extends Model
{
    use HasFactory;
    use Translatable;


    protected $table = 'tb_home_content_sliders';
    protected $fillable = [ 'id_title', 'id_description', 'en_title', 'en_description', 'image'];


}
