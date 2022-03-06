<?php

namespace App\Repositories;

use App\Models\ProftfolioCategory;
use App\Repositories\BaseRepository;

/**
 * Class ProftfolioCategoryRepository
 * @package App\Repositories
 * @version March 6, 2022, 4:41 am UTC
*/

class ProftfolioCategoryRepository extends BaseRepository
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
        return ProftfolioCategory::class;
    }
}
