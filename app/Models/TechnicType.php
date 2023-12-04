<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TechnicType extends Model
{
    protected $fillable = [
        'name',
        'active'
    ];

    public function technics(): HasMany
    {
        return $this->hasMany(Technic::class);
    }

    public function technicsActive(): HasMany
    {
        return $this->hasMany(Technic::class)->where('active',1);
    }
}
