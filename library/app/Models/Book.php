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
        'thumb',
        'description'
    ];

    protected static $searchable = [
        'books.title',
        'books.description',
        'authors.full_name',
        'categories.name'
    ];

    protected $dates = ['created_at, updated_at', 'deleted_at'];

    public function bookAuthor(){
        return $this->hasOne('App\Models\BookAuthor');
    }

    public function bookCategory(){
        return $this->hasOne('App\Models\BookCategory');
    }

    public static function searchBookByKeyword($keyword){
        $terms = explode(" ", $keyword);

        $books = Book::select('books.title', 'books.description', 'authors.full_name', 'categories.name')
                    ->join('books_authors', 'books.id', '=', 'books_authors.book_id')
                    ->join('books_categories', 'books.id', '=', 'books_categories.book_id')
                    ->join('authors', 'authors.id', '=', 'books_authors.author_id')
                    ->join('categories', 'categories.id', '=', 'books_categories.category_id');

        foreach(self::$searchable as $column){
            foreach($terms as $term){
                $books = $books->orWhere($column, "LIKE", "%$term%");
            }
        }

        $results = $books->get();

        return $results;
    }
}
