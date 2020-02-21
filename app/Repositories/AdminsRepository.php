<?php

namespace App\Repositories;

use App\Models\Admins;
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
class AdminsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'gender',
        'age',
        'university',
        'study',
        'force',
        'friends_count',
        'phone',
        'photo',
        'type',
        'status'
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Admins::class;
    }
}
