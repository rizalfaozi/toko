<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Stock
 * @package App\Models
 * @version January 7, 2020, 3:54 pm WIB
 *
 * @property string name
 * @property integer qty
 * @property integer qty_item
 */
class Stock extends Model
{
   // use SoftDeletes;

    public $table = 'stocks';
    

    //protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'qty',
        'other',
        'size'
       
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'qty' => 'integer',
        'other'=>'string',
        'size' => 'integer'
       
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'qty' => 'required',
        'other'=>'required',
        'size'=>'required'
    ];

    
}
