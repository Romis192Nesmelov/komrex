<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'target_audience',
        'course_objectives',
        'description',
        'duration',
        'active'
    ];

    public function eventPersons(): HasMany
    {
        return $this->hasMany(EventPerson::class);
    }
}
