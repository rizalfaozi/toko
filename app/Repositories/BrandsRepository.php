<?php

namespace App\Repositories;

use App\Models\Brands;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VirtualRepository
 * @package App\Repositories
 * @version August 15, 2018, 2:17 pm UTC
 *
 * @method Virtual findWithoutFail($id, $columns = ['*'])
 * @method Virtual find($id, $columns = ['*'])
 * @method Virtual first($columns = ['*'])
*/
class BrandsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'photo'
       
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Brands::class;
    }
}
