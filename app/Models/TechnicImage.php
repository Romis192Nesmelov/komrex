<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TechnicImage extends Model
{
    use HasFactory;

    protected $fillable = ['image','technic_id'];

    public $timestamps = false;

    public function technic(): BelongsTo
    {
        return $this->belongsTo(Technic::class);
    }
}
