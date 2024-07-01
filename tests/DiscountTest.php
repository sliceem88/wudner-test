<?php

use App\Models\Rule;
use App\Models\Product;
use App\Services\EmptyDiscount;
use PHPUnit\Framework\TestCase;
use App\Services\NumberDiscount;
use App\Services\PercentDiscount;

class DiscountTest extends TestCase
{
    private Product $product;
    private Rule $rule;

    public function test_percent_discount()
    {
        $percentDiscountInstance = new PercentDiscount();
        $productCollection = Product::all();
        $percentsDiscountProducts = $percentDiscountInstance->calculate($productCollection, 0, 'food', 50);
        $percentsDiscount = $percentsDiscountProducts->where('id', '=', $this->product->id)->first()->price;

        $this->assertEquals($percentsDiscount, 5);
    }

    public function test_number_discount()
    {
        $numberDiscountInstance = new NumberDiscount();
        $productCollection = Product::all();
        $numberDiscountProducts = $numberDiscountInstance->calculate($productCollection, 0, 'food', 5);
        $numberedDiscount = $numberDiscountProducts->where('id', '=', $this->product->id)->first()->price;

        $this->assertEquals($numberedDiscount, 5);
    }

    public function test_empty_discount()
    {
        $emptyDiscountInstance = new EmptyDiscount();
        $productCollection = Product::all();
        $emptyDiscountProducts = $emptyDiscountInstance->calculate($productCollection, 0, '', 0);

        $this->assertEquals($productCollection, $emptyDiscountProducts);
    }

    protected function setUp(): void
    {
        $this->product = Product::create(
            [
                'name' => 'Test Product',
                'price' => '10',
                'type' => 'food'
            ]
        );

        $this->rule = Rule::create(
            [
                'name' => 'Test Rule',
                'type' => 'number',
                'discount' => '5',
                'group' => 'food'
            ]
        );
    }

    protected function tearDown(): void
    {
        $this->product->delete();
        $this->rule->delete();
    }
}
