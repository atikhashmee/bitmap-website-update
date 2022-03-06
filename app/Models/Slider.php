<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Slider
 * @package App\Models
 * @version March 6, 2022, 5:45 am UTC
 *
 * @property string $header_title
 * @property string $url
 * @property string $post_date
 * @property string $description
 * @property boolean $is_visible
 * @property string $image
 */
class Slider extends Model
{
    use SoftDeletes;

    public $table = 'sliders';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'header_title',
        'url',
        'post_date',
        'description',
        'is_visible',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'header_title' => 'string',
        'url' => 'string',
        'post_date' => 'datetime',
        'description' => 'string',
        'is_visible' => 'boolean',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'header_title' => 'required',
        'url' => 'required'
    ];

    
}
