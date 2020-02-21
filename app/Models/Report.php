<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Report
 * @package App\Models
 * @version December 19, 2019, 1:00 pm WIB
 *
 * @property string kode_pesanan
 * @property integer produk_id
 * @property integer qty
 * @property integer price
 * @property integer status
 * @property string keterangan
 */
class Report extends Model
{
    //use SoftDeletes;

    public $table = 'reports';
    

   // protected $dates = ['deleted_at'];


    public $fillable = [
        'order_id',
        'product_id',
        'qty',
        'price',
        'status',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'order_id' => 'string',
        'product_id' => 'integer',
        'qty' => 'integer',
        'price' => 'integer',
        'status' => 'integer',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_id' => 'required',
        'product_id' => 'required',
        'qty' => 'required',
        'price' => 'required',
        'status' => 'required'
    ];


     public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    
}
