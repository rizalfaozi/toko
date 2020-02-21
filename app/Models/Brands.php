<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Brands extends Model
{
     // use SoftDeletes;

    public $table = 'brands';
    

   // protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'slug',
        'setting',
        'menu_id'
     
       
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'slug'=>'string',
        'setting' => 'string',
        'menu_id' => 'integer'
      

       
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'name' => 'required'
    ];
}
