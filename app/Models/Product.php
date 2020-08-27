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
        'name',
        'slug',
        'brand_id',
        'sub_brand_id',
        'price',
        'description',
        'noted',
        'stok',
        'theme',
        'color',
        'photo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'slug' =>'string',
        'brand_id' => 'integer',
        'sub_brand_id'=> 'integer',
        'price' => 'string',
        'noted' => 'string',
        'stok'=>'integer',
        'description' => 'string',
        'theme' => 'string',
        'color' => 'string',
        'photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'brand_id' => 'required',
        'sub_brand_id' => 'required',
        'price' => 'required',
        'theme' => 'required',
        'stok' => 'required',
        'color' => 'required'
    ];

     public function brand()
    {
        return $this->belongsTo('App\Models\Brands');
    }
}
