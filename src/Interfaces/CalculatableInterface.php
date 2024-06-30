<?php

namespace App\Interfaces;

interface CalculatableInterface
{
    public function calculate(array $productList, ?string $group = null, ?int $discountAmount = null): float|int;
}
