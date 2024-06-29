<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $table = 'cart_rules';

    protected $fillable = [
        'type', 'name', 'discount', 'group'
    ];
}
