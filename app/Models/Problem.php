<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'schema',
        'solution'
    ];
}