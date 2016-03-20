<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{

    use SoftDeletes;

    protected $table = 'roles';

    protected $fillable = [
        'name',
        'details'
    ];

    protected $dates = ['created_at, updated_at', 'deleted_at'];

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
