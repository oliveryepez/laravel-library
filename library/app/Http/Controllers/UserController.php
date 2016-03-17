<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

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

    public function add(Request $request){
        $roles = Role::select('name', 'id')->get();
        $view = view('users.add');

        if($request->isMethod('post')){
            User::createUserbyRole(Input::all());
        }

        return $view->with('roles', $roles);
    }
}
