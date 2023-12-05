<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConstructiveFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'head',
        'text',
        'technic_id',
        'active'
    ];

    public function technic(): BelongsTo
    {
        return $this->belongsTo(Technic::class);
    }
}
