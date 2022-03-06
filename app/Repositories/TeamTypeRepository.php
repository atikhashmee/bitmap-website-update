<?php

namespace App\Repositories;

use App\Models\TeamType;
use App\Repositories\BaseRepository;

/**
 * Class TeamTypeRepository
 * @package App\Repositories
 * @version March 6, 2022, 5:08 am UTC
*/

class TeamTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TeamType::class;
    }
}
