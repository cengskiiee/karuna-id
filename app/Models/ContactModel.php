<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;


class ContactModel extends Model
{
    use HasFactory;
    use Translatable;

    protected $table = 'tb_contact';

    protected $fillable = [
        'city',
        'address',
        'location_detail',
        'email',
        'contact_number',
        'instagram',
        'linkedin',
        'facebook',
        'youtube',
    ];

    public $incrementing = false;
    protected $primaryKey = null;
    public $timestamps = true;


}
