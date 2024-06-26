<?php

use App\Models\Cart;
use App\Models\Rule;
use App\Models\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    private Product $product;
    private Rule $rule;
    private Cart $cartHandler;

    public function test_cart_calculation_number()
    {
        $cartData = [
            'productsId' => [$this->product->id],
            'rulesId' => [$this->rule->id],
        ];
        [$total] = $this->cartHandler->process($cartData);


        $this->assertTrue($total === 5);
    }

    public function test_cart_calculation_discount()
    {
        $this->rule->type = 'percent';
        $this->rule->save();
        [$total] = $this->cartHandler->process($this->getCartData());

        $this->assertTrue($total === 9.5);
    }

    public function test_cart_calculation_wrong_group()
    {
        $this->rule->group = 'liquid';
        $this->rule->save();
        [$total] = $this->cartHandler->process($this->getCartData());

        $this->assertTrue($total === 10);
    }

    public function test_cart_calculation_empty_group()
    {
        $this->rule->group = '';
        $this->rule->save();
        [$total] = $this->cartHandler->process($this->getCartData());

        $this->assertTrue($total === 5);
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

        $this->cartHandler = new Cart();
    }

    protected function getCartData(): array 
    {
        return [
            'productsId' => [$this->product->id],
            'rulesId' => [$this->rule->id],
        ];
    }

    protected function tearDown(): void
    {
        $this->product->delete();
        $this->rule->delete();
    }
}
