<?php

namespace App\Services;

use App\Interfaces\CalculatableInterface;

class PercentDiscount implements CalculatableInterface
{
    public function calculate(array $productList, ?string $group = null, ?int $discountAmount = null): float|int
    {
    }
}
