<?php
namespace App\Services;

use App\Interfaces\CalculatableInterface;

class EmptyDiscount implements CalculatableInterface
{
    public function calculate(array $productList, ?string $group = null, ?int $discountAmount = null): float|int
    {
        return array_sum(array_map(fn($product) => (float)$product['price'], $productList));
    }
}
