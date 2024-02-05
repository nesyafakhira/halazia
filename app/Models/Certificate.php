<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_id',
        'number',
        'type',
    ];

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->number = MixCaseULID::generate();
        });
    }

    public function participant(): BelongsTo
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }
}
