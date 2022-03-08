<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceHolder extends Model
{
    protected $fillable = 
    [
        'service_name',
        'about_service',
        'long_about_sevice',
        'date_time','price',
        'services_photo'
    ];
    
}
