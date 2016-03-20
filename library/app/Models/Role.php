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

    public static $searchable = [
        'name',
        'details'
    ];

    protected $dates = ['created_at, updated_at', 'deleted_at'];

    public static function searchByKeyword($keyword){

        $terms = explode(" ", $keyword);

        $roles = Role::select('*');

        foreach(self::$searchable as $column){
            foreach($terms as $term){
                $roles = $roles->orWhere($column, "LIKE", "%$term%");
            }
        }

        $results = $roles->get();


        return $results;
    }
}
