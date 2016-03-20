<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{



    public function search(Request $request){

        $roles = Role::all();
        $view = view('roles.search')->with('roles', $roles);

        return $view;

    }

    public function edit(Request $request){
        $values = $request->all();
        $response = null;


        if(!$this->isRequestHaveEmptyValues($values)){

            $role = Role::find($values['id']);
            $role->name = $values['name'];
            $role->details = $values['details'];

            $role->update();

            $response = $role;

        }else{

            $response = [
                'error' => "Can't leave empty fields"
            ];
        }

        return $response;
    }

    public function add(Request $request){
        $values = $request->all();
        $response = null;

        if(!$this->isRequestHaveEmptyValues($values)){
            $role = Role::create([
                'name'    => strtolower(trim($values['name'])),
                'details' =>strtolower(trim($values['details']))
            ]);

            $response = $role;
        }else{
            $response = [
                'error' => "Can't leave empty fields"
            ];
        }

        return $response;
    }

    public function delete(Request $request){

        $value = $request->all();

        $role = Role::find($value['id']);
        $role->delete();
    }

    private function isRequestHaveEmptyValues($request){

        $isEmpty = false;

        foreach ($request as $value) {
            if (empty($value)) {
                $isEmpty = true;
            }
        }
        return $isEmpty;
    }
}
