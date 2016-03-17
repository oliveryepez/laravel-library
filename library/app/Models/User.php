<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

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

    public static $searchble = [
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

        $query = User::select('*');

        foreach(self::$searchble as $column){
            foreach($terms as $term){
                $query->orWhere($column, strtolower($term));
            }
        }

        $users = $query->get();


        return $users;
    }
}
