<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TechnicFile extends Model
{
    protected $fillable = ['technic_id'];

    public $timestamps = false;

    public function technic(): BelongsTo
    {
        return $this->belongsTo(Technic::class);
    }
}
