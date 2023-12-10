<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveMonitoringStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'head',
        'text',
        'active'
    ];
}
