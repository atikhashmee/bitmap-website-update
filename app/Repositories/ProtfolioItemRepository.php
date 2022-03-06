<?php

namespace App\Repositories;

use App\Models\ProtfolioItem;
use App\Repositories\BaseRepository;

/**
 * Class ProtfolioItemRepository
 * @package App\Repositories
 * @version March 6, 2022, 2:40 pm UTC
*/

class ProtfolioItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_title',
        'proftfolio_category_id',
        'about_project',
        'detail_description',
        'project_date',
        'client',
        'project_location',
        'video_demo_link',
        'video_description'
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
        return ProtfolioItem::class;
    }
}
