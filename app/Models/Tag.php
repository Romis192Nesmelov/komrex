<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'page',
        'sub_page',
        'title',
        'description'
    ];
}
