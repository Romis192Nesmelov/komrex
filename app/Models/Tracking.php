<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $table = 'trackings';

    protected $fillable = [
        'head',
        'text',
        'active'
    ];
}
