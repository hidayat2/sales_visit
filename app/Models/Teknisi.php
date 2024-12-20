<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teknisi extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'alamat',
        'nama_bank',
        'no_req',
        'password',
    ];
}
