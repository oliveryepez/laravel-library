<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'id',
        'full_name',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
