<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Technic extends Model
{
    protected $fillable = [
        'name',
        'weight',
        'power',
        'engine_model',
        'komrex',
        'characteristics',
        'description',
        'active',
        'technic_type_id'
    ];

    public function technicType(): BelongsTo
    {
        return $this->belongsTo(TechnicType::class);
    }

    public function constructiveFeatures(): HasMany
    {
        return $this->hasMany(ConstructiveFeature::class);
    }

    public function constructiveFeaturesActive(): HasMany
    {
        return $this->hasMany(ConstructiveFeature::class)->where('active',1);
    }

    public function images(): HasMany
    {
        return $this->hasMany(TechnicImage::class);
    }

    public function technicVideos(): HasMany
    {
        return $this->hasMany(TechnicVideo::class);
    }

    public function technicVideosActive(): HasMany
    {
        return $this->hasMany(TechnicVideo::class)->where('active',1);
    }

    public function files(): HasMany
    {
        return $this->hasMany(TechnicFile::class);
    }
}
