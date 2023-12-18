<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnitType extends Model
{
    protected $fillable = [
        'name',
        'active'
    ];

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    public function unitsActive(): HasMany
    {
        return $this->hasMany(Unit::class)->where('active',1);
    }
}
