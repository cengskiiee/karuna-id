<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\Translatable;



class EducationModel extends Model
{
    use HasFactory;
    use Translatable;

    protected $table = 'tb_education';

    protected $fillable = [
        'id_title',
        'en_title',
        'id_description',
        'en_description',
        'image', 
        'date', 
        'slug',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

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
