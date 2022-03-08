<?php

namespace App\Models;

use App\Models\Accounts\Income;
use Illuminate\Database\Eloquent\Model;

class ClientsLists extends Model
{
    protected $fillable = [
        'Compnay_name',
        'phone_number',
        'email',
        'address',
        'avater',
        'status'
    ];

}
