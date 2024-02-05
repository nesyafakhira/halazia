<?php

namespace App\Models;

use App\Models\Certificate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peserta extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'pelatihan'
    ];

    public function certificate(): HasOne
    {
        return $this->hasOne(Certificate::class, 'peserta_id');
    }
}
