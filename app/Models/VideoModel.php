<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\Translatable;


class VideoModel extends Model
{
    use HasFactory;
    use Translatable;


    protected $table = 'tb_videos';
    protected $fillable = ['id_title', 'en_title', 'link_video', 'image', 'slug'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->id_title);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->id_title);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
 