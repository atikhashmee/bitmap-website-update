<?php

namespace App\Repositories;

use App\Models\TeamMember;
use App\Repositories\BaseRepository;

/**
 * Class TeamMemberRepository
 * @package App\Repositories
 * @version March 6, 2022, 5:25 am UTC
*/

class TeamMemberRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'team_type_id',
        'designation',
        'description',
        'email',
        'status',
        'linkedin',
        'twitter',
        'instagram'
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
        return TeamMember::class;
    }
}
