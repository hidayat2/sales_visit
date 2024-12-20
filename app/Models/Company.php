<?php

namespace App\Models;

use App\Models\Visit;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'name',
    ];

    public function author(): HasMany  ///author method
        {
            return $this->hasMany(Visit::class, 'company_id');
        }
}


