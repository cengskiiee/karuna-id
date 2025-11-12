<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class InboxContactModel extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'tb_inbox_contact';
    protected $fillable = ['nama_lengkap', 'nomor_handphone', 'email', 'deskripsi'];

    protected $dates = ['deleted_at'];
}
