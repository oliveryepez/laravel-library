<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{

    protected $table = 'books_authors';

    protected $fillable = ['book_id', 'author_id'];


    public function author(){
        return $this->belongsTo('App\Models\Author');
    }

}
