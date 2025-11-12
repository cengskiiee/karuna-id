<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceCategoryModel;
use Illuminate\Support\Str;
use App\Traits\Translatable;



class ServicesModel extends Model
{
    use HasFactory;
    use Translatable;


    // Nama tabel
    protected $table = 'tb_services';

    // Kolom-kolom yang dapat diisi
    protected $fillable = [
        'id_title', 
        'en_title',
        'id_description',
        'en_description',
        'image',
        'service_category_id',
        'slug',
    ];

    // Relasi ke tabel tb_services_category
    public function category()
    {
        return $this->belongsTo(ServiceCategoryModel::class, 'service_category_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = $model->generateUniqueSlug($model->id_title);
        });

        static::updating(function ($model) {
            if ($model->isDirty('id_title')) {
                $model->slug = $model->generateUniqueSlug($model->id_title);
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
