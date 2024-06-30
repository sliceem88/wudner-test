<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $table = 'cart_rules';

    protected $fillable = [
        'type', 'name', 'discount', 'group',
    ];

    public function handle(Collection $products, float $total)
    {
        $discount = $this->discount;
        $groupProductRules = $this->group;
        $typeOfDiscount = $this->type;
    }
}
