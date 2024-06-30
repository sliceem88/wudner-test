<?php

namespace App\Services;

use App\Interfaces\CalculatableInterface;
use Illuminate\Database\Eloquent\Collection;

final class EmptyDiscount implements CalculatableInterface
{
    public function calculate(Collection $productList, float|int $total, ?string $group = null, ?int $discountAmount = null): Collection
    {
        return $productList;
    }
}
