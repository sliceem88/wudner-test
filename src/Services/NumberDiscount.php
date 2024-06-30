<?php

namespace App\Services;

use App\Interfaces\CalculatableInterface;

class NumberDiscount implements CalculatableInterface
{
    public function calculate(array $productList, ?string $group = null, ?int $discountAmount = null): float|int
    {
    }
}
