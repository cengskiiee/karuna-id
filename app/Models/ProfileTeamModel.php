<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;


class ProfileTeamModel extends Model
{
    use HasFactory;
    use Translatable;


    protected $table = 'tb_profile_team';

    protected $fillable = ['name', 'position', 'email', 'linkedin', 'image' ];

    public function getLinkedinAttribute($value)
    {
        if (!preg_match("~^(?:f|ht)tps?://~i", $value)) {
            return "https://" . $value;
        }
        return $value;
    }



}
