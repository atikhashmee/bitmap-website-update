<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProtfolioItem
 * @package App\Models
 * @version March 6, 2022, 2:40 pm UTC
 *
 * @property \App\Models\ProftfolioCategory $proftfolioCategory
 * @property string $project_title
 * @property integer $proftfolio_category_id
 * @property string $about_project
 * @property string $detail_description
 * @property string $project_date
 * @property string $client
 * @property string $project_location
 * @property string $video_demo_link
 * @property string $video_description
 * @property string $image
 */
class ProtfolioItem extends Model
{
    use SoftDeletes;

    public $table = 'protfolio_items';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'project_title',
        'proftfolio_category_id',
        'about_project',
        'detail_description',
        'project_date',
        'client',
        'project_location',
        'video_demo_link',
        'video_description',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'project_title' => 'string',
        'proftfolio_category_id' => 'integer',
        'about_project' => 'string',
        'detail_description' => 'string',
        'project_date' => 'datetime',
        'client' => 'string',
        'project_location' => 'string',
        'video_demo_link' => 'string',
        'video_description' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_title' => 'required',
        'client' => 'required',
        'project_location' => 'required',
        'video_demo_link' => 'required',
        'video_description' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function proftfolioCategory()
    {
        return $this->belongsTo(\App\Models\ProftfolioCategory::class, 'proftfolio_category_id', 'id');
    }
}
