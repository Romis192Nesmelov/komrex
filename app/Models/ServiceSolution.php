<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ServiceSolution extends Model
{
    protected $fillable = [
        'image',
        'head',
        'text',
        'active'
    ];
}
