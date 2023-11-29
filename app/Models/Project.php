<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $fillable = [
        'image',
        'head',
        'project_type_id',
        'active'
    ];

    public function projectType(): BelongsTo
    {
        $this->belongsTo(ProjectType::class);
    }
}
