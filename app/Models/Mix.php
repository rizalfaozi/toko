<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Mix
 * @package App\Models
 * @version January 7, 2020, 4:14 pm WIB
 *
 * @property string name
 * @property integer stock_id
 * @property integer qty
 */
class Mix extends Model
{
    use SoftDeletes;

    public $table = 'mixes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'brand_id',
        'sub_brand_id',
        'recin',
        'talk',
        'katalis',
        'met',
        'dempul'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'brand_id' => 'integer',
        'sub_brand_id' => 'integer',
        'recin' => 'integer',
        'talk' => 'integer',
        'katalis' => 'integer',
        'met' => 'integer',
        'dempul' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'brand_id' => 'required',
        'sub_brand_id' => 'required'
    ];

      public function brand()
    {
        return $this->belongsTo('App\Models\Brands');
    }

    
}
