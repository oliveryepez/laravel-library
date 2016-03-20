<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Mockery\CountValidator\Exception;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'display_name',
        'username',
        'email',
        'password',
        'active'
    ];

    public static $searchable = [
        'first_name',
        'last_name',
        'display_name',
        'username',
        'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function searchByKeyword($keyword){

        $terms = explode(" ", $keyword);

        $users = User::select('*');

        foreach(self::$searchable as $column){
            foreach($terms as $term){
                $users = $users->orWhere($column, "LIKE", "%$term%");
            }
        }

        $results = $users->get();


        return $results;
    }

    public static function userValidator($values){

        return Validator::make($values, [
            'first_name' => 'required|max:45',
            'last_name' => 'required|max:45',
            'username' => 'required|max:45',
            'email' => 'required|email|max:255|unique:users',
        ]);
    }

    public static function createUserbyRole($values){
        $role = Role::find($values['role']);

        $display_name = trim(strtolower($values['first_name'])) . ' ' . trim(strtolower($values['last_name']));

        if(self::userValidator($values)){

            $user = User::create([
                'first_name'   => trim(strtolower($values['first_name'])),
                'last_name'    => trim(strtolower($values['last_name'])),
                'display_name' => $display_name,
                'username'     => trim(strtolower($values['username'])),
                'email'        => trim(strtolower($values['email'])),
                'password'     => bcrypt($values['username']),
                'active'       => true,
            ]);

            $user_role = UserRole::create([
                'user_id' => $user->id,
                'role_id' => $role->id
            ]);
        }else{
            throw new Exception("Can't leave blank fields");
        }
    }
}
