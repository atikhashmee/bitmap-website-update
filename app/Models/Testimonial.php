<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Testimonial
 * @package App\Models
 * @version March 6, 2022, 4:49 am UTC
 *
 * @property string $client_name
 * @property string $comment
 * @property string $client_media
 * @property string $client_image
 * @property string $signature_image
 */
class Testimonial extends Model
{
    use SoftDeletes;

    public $table = 'testimonials';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'client_name',
        'comment',
        'client_media',
        'client_image',
        'signature_image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'client_name' => 'string',
        'comment' => 'string',
        'client_media' => 'string',
        'client_image' => 'string',
        'signature_image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'client_name' => 'required',
        'client_media' => 'required'
    ];

    
}
