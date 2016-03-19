<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = 'roles';

    protected $fillable = [
        'name',
        'details'
    ];

    public static function searchByKeyword($keyword){

        $terms = explode(" ", $keyword);

        $query = Role::select('*');

        foreach(self::$searchble as $column){
            foreach($terms as $term){
                $query->orWhere($column, strtolower($term));
            }
        }

        $users = $query->get();


        return $users;
    }
}
