<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Produk
 * @package App\Models
 * @version December 19, 2019, 9:22 am WIB
 *
 * @property string name
 * @property integer brand_id
 * @property string price
 * @property string description
 * @property string motif
 * @property string warna
 * @property string ephoto
 */
class Product extends Model
{
   // use SoftDeletes;

    public $table = 'products';
    

    //protected $dates = ['deleted_at'];


    public $fillable = [
        'product_id',
        'slug',
        'brand_id',
        'sub_brand_id',
        'price',
        'description',
        'noted',
        'theme',
        'color',
        'photo',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_id' => 'integer',
        'slug' =>'string',
        'brand_id' => 'integer',
        'sub_brand_id'=> 'integer',
        'price' => 'string',
        'noted' => 'string',
       
        'description' => 'string',
        'theme' => 'string',
        'color' => 'string',
        'photo' => 'string',
        'status'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required',
        'brand_id' => 'required',
        'sub_brand_id' => 'required',
        'price' => 'required',
        'theme' => 'required',
        'status'=> 'required',
        'color' => 'required'
    ];

     public function brand()
    {
        return $this->belongsTo('App\Models\Brands');
    }
}
