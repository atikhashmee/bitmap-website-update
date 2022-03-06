<?php

namespace App\Repositories;

use App\Models\Testimonial;
use App\Repositories\BaseRepository;

/**
 * Class TestimonialRepository
 * @package App\Repositories
 * @version March 6, 2022, 4:49 am UTC
*/

class TestimonialRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_name',
        'comment',
        'client_media'
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
        return Testimonial::class;
    }
}
