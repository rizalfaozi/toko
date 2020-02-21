<?php

namespace App\Repositories;

use App\Models\Mix;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MixRepository
 * @package App\Repositories
 * @version January 7, 2020, 4:14 pm WIB
 *
 * @method Mix findWithoutFail($id, $columns = ['*'])
 * @method Mix find($id, $columns = ['*'])
 * @method Mix first($columns = ['*'])
*/
class MixRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'stock_id',
        'qty'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Mix::class;
    }
}
