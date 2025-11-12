<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\Translatable;


class ProjectsModel extends Model
{
    use HasFactory;
    use Translatable;

    
    protected $table = 'tb_projects';
    protected $fillable = ['en_project_name', 'en_description', 'id_project_name', 'id_description', 'image', 'location_address', 'project_date', 'client_company', 'slug'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->id_project_name);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->id_project_name);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


}