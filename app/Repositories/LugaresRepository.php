<?php

namespace App\Repositories;

use App\Models\Lugares;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LugaresRepository
 * @package App\Repositories
 * @version February 7, 2018, 12:46 pm UTC
 *
 * @method Lugares findWithoutFail($id, $columns = ['*'])
 * @method Lugares find($id, $columns = ['*'])
 * @method Lugares first($columns = ['*'])
*/
class LugaresRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'latitud',
        'longitud',
        'photo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Lugares::class;
    }
}
