<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title',
        'publication_date',
        'user_role_id',
        'thumb'
    ];

    protected $dates = ['created_at, updated_at', 'deleted_at'];
}
