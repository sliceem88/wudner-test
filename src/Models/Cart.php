<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use App\Models\Rule;

class Cart
{
    public function process(array $rawData)
    {
        $rules = Rule::whereIn('id', $rawData['rulesId'])->get();
        $products = Product::whereIn('id', $rawData['productsId'])->get();

        $this->handleCart($rules, $products);
    }

    /**
     * @param Collection<Rule> $rules
     * @param Collection<Product> $products
     * @return void
     */
    private function handleCart(Collection $rules, Collection $products)
    {
        $total = 0;

        foreach($rules->toArray() as $rule) {
            $total = $rule->handle($products, $total);
        }
    }
}
