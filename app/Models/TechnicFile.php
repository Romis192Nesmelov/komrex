<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TechnicFile extends Model
{
    protected $fillable = ['pdf','name','technic_id','active'];

    public function technic(): BelongsTo
    {
        return $this->belongsTo(Technic::class);
    }
}
