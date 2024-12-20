<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visit extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'user_id',
        'visit_date',
        'company_id',
        'description',
        'status'
    ];

    public function getTanggalVisitAttribute($value)
    {
        return Carbon::parse($value)->locale('id')->isoFormat('D MMMM YYYY'); // Sesuaikan format tanggal sesuai kebutuhan
    }

    public function company(): BelongsTo
            {
                return $this->belongsTo(Company::class); /// apabila nama field primary key ny berbeda
            }

}
