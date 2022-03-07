<?php

namespace App\Repositories;

use App\Models\ProtfolioFaq;
use App\Repositories\BaseRepository;

/**
 * Class ProtfolioFaqRepository
 * @package App\Repositories
 * @version March 7, 2022, 6:15 am UTC
*/

class ProtfolioFaqRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'proftfolio_category_id',
        'title',
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
        return ProtfolioFaq::class;
    }
}
