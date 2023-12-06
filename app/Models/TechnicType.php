<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
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

    public function technicsKomrex(): HasMany
    {
        return $this->hasMany(Technic::class)->where('active',1)->where('komrex',1);
    }

    public function technicsCurrentOffer(): HasMany
    {
        return $this->hasMany(Technic::class)->where('active',1)->where('komrex',0);
    }
}
