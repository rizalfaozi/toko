<?php

namespace App\Repositories;

use App\Models\Testimoni;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TestimoniRepository
 * @package App\Repositories
 * @version December 19, 2019, 2:59 pm WIB
 *
 * @method Testimoni findWithoutFail($id, $columns = ['*'])
 * @method Testimoni find($id, $columns = ['*'])
 * @method Testimoni first($columns = ['*'])
*/
class TestimoniRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'comment',
        'status',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Testimoni::class;
    }
}
