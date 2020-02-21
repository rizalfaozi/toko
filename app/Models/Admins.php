<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Admins extends Model
{
     // use SoftDeletes;

    public $table = 'users';
    

   // protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'photo',
        'type',
        'status'
       
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'phone' => 'string',
        'photo' => 'string',
        'type'  =>  'string',
        'status' => 'integer'

       
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
       
    ];
}
