<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function search(Request $request){

        $search_results = null;
        $view = view('users.search');

        if($request->isMethod('post')){
            $users = User::searchByKeyword($request->input('search'));

            $view->with('users', $users);
        }

        return $view;

    }
}
