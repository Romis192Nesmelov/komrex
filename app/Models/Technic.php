<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Technic extends Model
{
    protected $fillable = [
        'name',
        'weight',
        'power',
        'engine_model',
        'komrex',
        'characteristics',
        'active',
        'technic_type_id'
    ];

    public function technicType(): BelongsTo
    {
        return $this->belongsTo(TechnicType::class);
    }


}
