<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TeamMember
 * @package App\Models
 * @version March 6, 2022, 5:25 am UTC
 *
 * @property \App\Models\TeamType $teamType
 * @property string $name
 * @property integer $team_type_id
 * @property string $designation
 * @property string $description
 * @property string $email
 * @property string $status
 * @property boolean $is_private
 * @property string $linkedin
 * @property string $twitter
 * @property string $instagram
 * @property string $image
 */
class TeamMember extends Model
{
    use SoftDeletes;

    public $table = 'team_members';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'team_type_id',
        'designation',
        'description',
        'email',
        'status',
        'is_private',
        'linkedin',
        'twitter',
        'instagram',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'team_type_id' => 'integer',
        'designation' => 'string',
        'description' => 'string',
        'email' => 'string',
        'status' => 'string',
        'is_private' => 'boolean',
        'linkedin' => 'string',
        'twitter' => 'string',
        'instagram' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'designation' => 'required',
        'email' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function teamType()
    {
        return $this->belongsTo(\App\Models\TeamType::class, 'team_type_id', 'id');
    }
}
