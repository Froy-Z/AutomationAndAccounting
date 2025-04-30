<?php

namespace App\Services;

use App\Contracts\SocksRepositoryContract;
use App\Contracts\SocksServiceContract;
use App\Models\Socks;

readonly class SocksService implements SocksServiceContract
{
    public function __construct(
        private SocksRepositoryContract $socksRepository
    ) {}

    public function registerGoods($color, $cottonPart, $quantity): Socks
    {
        return $this->socksRepository->createOrUpdate($color, $cottonPart, $quantity);
    }

    public function releaseGoods($color, $cottonPart, $quantity): ?Socks
    {
        $socks = $this->socksRepository->findSocks($color, $cottonPart);

        if (!$socks || $socks->quantity < $quantity) {
            return null;
        }

        $this->socksRepository->decreaseQuantity($socks, $quantity);
        return $socks;
    }

    public function getMathOperation($operation): string
    {
        return match ($operation) {
            'moreThan' => '>',
            'lessThan' => '<',
            default => '=',
        };
    }
}

