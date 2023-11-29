<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectType extends Model
{
    protected $fillable = [
        'name',
        'active'
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function activeProjects(): HasMany
    {
        return $this->hasMany(Project::class)->where('active',1);
    }
}
