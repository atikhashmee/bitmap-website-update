<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProtfolioFaq
 * @package App\Models
 * @version March 7, 2022, 6:15 am UTC
 *
 * @property \App\Models\ProftfolioCategory $proftfolioCategory
 * @property integer $protfolio_item_id
 * @property string $title
 * @property string $description
 */
class ProtfolioFaq extends Model
{
    use SoftDeletes;

    public $table = 'protfolio_faqs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'protfolio_item_id',
        'title',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'protfolio_item_id' => 'integer',
        'title' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function proftfolioCategory()
    {
        return $this->belongsTo(\App\Models\ProftfolioCategory::class, 'protfolio_item_id', 'id');
    }
}
