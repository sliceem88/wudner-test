<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use App\Models\Rule;
use App\Services\NumberDiscount;
use App\Services\PercentDiscount;
use App\Services\EmptyDiscount;
use App\Interfaces\CalculatableInterface;

class Cart
{
    private const DISCOUNT_SERVICES = [
        'empty' => EmptyDiscount::class,
        'percent' => PercentDiscount::class,
        'number' => NumberDiscount::class,
    ];

    public function process(array $rawData): array
    {
        $rules = Rule::whereIn('id', $rawData['rulesId'])->get();
        $products = Product::whereIn('id', $rawData['productsId'])->get();

        return [
            $this->handleCart($rules, $products),
            $products,
            $rules,
        ];
    }

    private function handleCart(Collection $rules, Collection $products): float|int
    {
        $total = 0;

        if ($rules->isEmpty()) {
            $discountService = $this->getDiscountService();
            $productListWithDiscount = $discountService->calculate($products, $total);
        }

        foreach ($rules as $rule) {
            $discount = $rule->discount;
            $groupProductRules = $rule->group;
            $discountService = $this->getDiscountService($rule->type);

            $productListWithDiscount = $discountService->calculate($products, $total, $groupProductRules, $discount);
        }

        return $this->calculateTotal($productListWithDiscount);
    }

    private function getDiscountService(string $discountType = 'empty'): CalculatableInterface
    {
        $serviceClassName = self::DISCOUNT_SERVICES[$discountType];

        return new $serviceClassName();
    }

    private function calculateTotal(Collection $products): int|float
    {
        return array_sum(array_map(fn($product) => $product['price'], $products->toArray()));
    }
}
