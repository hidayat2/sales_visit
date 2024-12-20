<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Tambahkan ini
use Illuminate\Notifications\Notifiable;

class m_user extends Authenticatable
{
    use HasFactory;

    protected $primary = 'user_id';

    protected $table = 'm_user';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'ktp',
        'password',
        'full_name',

    ];
}
