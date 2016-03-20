<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BooksController extends Controller
{
    public function index(Request $request){
        $view = view('books.index');

        return $view;
    }
}
