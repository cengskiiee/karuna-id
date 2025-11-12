<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;


class FaqModel extends Model
{
    use HasFactory;
    use Translatable;

    protected $table = 'tb_faq';

    protected $fillable = [
        'id_faq_question',
        'id_faq_answer',
        'en_faq_question',
        'en_faq_answer',
    ];


}
