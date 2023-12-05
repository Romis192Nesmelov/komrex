<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectImage extends Model
{
    protected $fillable = ['image','project_id'];

    public $timestamps = false;

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
