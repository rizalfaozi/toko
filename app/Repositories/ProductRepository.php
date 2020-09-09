<?php

namespace App\Repositories;

use App\Models\Product;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProdukRepository
 * @package App\Repositories
 * @version December 19, 2019, 9:22 am WIB
 *
 * @method Produk findWithoutFail($id, $columns = ['*'])
 * @method Produk find($id, $columns = ['*'])
 * @method Produk first($columns = ['*'])
*/
class ProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'brand_id',
        'price',
        'description',
        'theme',
        'color',
        'photo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }
}
