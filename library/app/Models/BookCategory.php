<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $table = 'books_categories';

    protected $fillable = ['book_id', 'category_id'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
