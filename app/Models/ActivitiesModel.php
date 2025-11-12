<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\Translatable;


class ActivitiesModel extends Model
{
    use HasFactory;
    use Translatable;


    protected $table = 'tb_activities';

    protected $fillable = [
        'id_title',
        'en_title',
        'id_description',
        'en_description',
        'image',
        'date',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($activities) {
            $activities->slug = $activities->generateUniqueSlug($activities->id_title);
        });

        static::updating(function ($activities) {
            if ($activities->isDirty('id_title')) {
                $activities->slug = $activities->generateUniqueSlug($activities->id_title);
            }
        });
    }

    public function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}