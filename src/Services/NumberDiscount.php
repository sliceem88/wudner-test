<?php

namespace App\Services;

use App\Interfaces\CalculatableInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

final class NumberDiscount implements CalculatableInterface
{
    public function calculate(Collection $productList, float|int $total, ?string $group = null, ?int $discountAmount = null): Collection
    {
        $productsWithDiscount = $productList->map(fn ($product) => $this->applyDiscount($product, $group, $discountAmount));

        return $productsWithDiscount;
    }

    protected function applyDiscount(Product $product, string $discountGroup = null, string $discount): Product
    {
        if (is_null($discountGroup) || !strlen($discountGroup) || $product->type === $discountGroup) {
            $product->price = (int)$product->price - (int)$discount;
        }

        return $product;
    }
}
