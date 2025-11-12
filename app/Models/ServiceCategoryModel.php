<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServicesModel;
use App\Traits\Translatable;


class ServiceCategoryModel extends Model
{
    use HasFactory;
    use Translatable;

    protected $table = 'tb_services_category';

    protected $fillable = [
        'en_service_category_title',
        'en_description',
        'id_service_category_title',
        'id_description',
    ];

    public function services()
    {
        return $this->hasMany(ServicesModel::class, 'service_category_id');
    }


}
