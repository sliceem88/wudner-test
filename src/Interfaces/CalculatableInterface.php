<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface CalculatableInterface
{
    public function calculate(Collection $productList, float|int $total, ?string $group = null, ?int $discountAmount = null): Collection;
}
