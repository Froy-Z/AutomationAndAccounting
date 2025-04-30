<?php

namespace App\Repositories;

use App\Contracts\SocksRepositoryContract;
use App\Models\Socks;
use Illuminate\Http\Response;

class SocksRepository implements SocksRepositoryContract
{
    public function getSumForParameter($color, $operation, $cottonPart): Response|string
    {
        return Socks::query()
            ->where('color', $color)
            ->where('cottonPart', $operation, $cottonPart)
            ->sum('quantity');
    }

    public function findSocks($color, $cottonPart): ?Socks
    {
        return Socks::query()
            ->where('color', $color)
            ->where('cottonPart', $cottonPart)
            ->first();
    }

    public function createOrUpdate($color, $cottonPart, $quantity): Socks
    {
        $socks = Socks::query()->firstOrNew([
            'color' => $color,
            'cottonPart' => $cottonPart,
        ]);
        $socks->quantity += $quantity;
        $socks->save();
        return $socks;
    }

    public function decreaseQuantity(Socks $socks, $amount): void
    {
        $socks->quantity -= $amount;
        $socks->save();
    }
}

