<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Slider
 * @package App\Models
 * @version October 15, 2019, 1:00 pm WIB
 *
 * @property string nama
 * @property string foto
 * @property integer prduct_id
 */
class Slider extends Model
{
   // use SoftDeletes;

    public $table = 'sliders';
    

    //protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'product_id',
        'description',
        'foto',
        'foto_crop',
        'slug',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'product_id'=> 'integer',
        'description' => 'text',
        'foto'=>'string',
        'foto_crop'=>'string',
        'slug'=>'string',
        'status' =>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'product_id' => 'required',
        'status' =>'required'
    ];

   

    
}
