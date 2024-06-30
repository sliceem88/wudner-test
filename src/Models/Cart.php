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
        'percents' => PercentDiscount::class,
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

    private function handleCart(Collection $rules, Collection $products): float
    {
        $total = 0;

        if ($rules->empty()) {
            $discountService = $this->getDiscountService();
            $total += $discountService->calculate($products->toArray());
        }

        foreach ($rules as $rule) {
            $discount = $rule->discount;
            $groupProductRules = $rule->group;
            $discountService = $this->getDiscountService($rule->type);

            $total += $discountService->calculate($products->toArray(), $groupProductRules, $discount);
        }

        return $total;
    }

    private function getDiscountService(string $discountType = 'empty'): CalculatableInterface
    {
        $serviceClassName = self::DISCOUNT_SERVICES[$discountType];

        return new $serviceClassName();
    }
}
