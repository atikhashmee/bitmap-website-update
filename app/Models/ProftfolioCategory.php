<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProftfolioCategory
 * @package App\Models
 * @version March 6, 2022, 4:41 am UTC
 *
 * @property string $name
 * @property string $description
 */
class ProftfolioCategory extends Model
{
    use SoftDeletes;

    public $table = 'proftfolio_categories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
