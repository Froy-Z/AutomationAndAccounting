<?php

namespace App\Contracts;

use App\Models\Socks;
use Illuminate\Http\Response;

interface SocksRepositoryContract
{
    public function getSumForParameter($color, $operation, $cottonPart): Response|string;
    public function findSocks($color, $cottonPart): ?Socks;
    public function createOrUpdate($color, $cottonPart, $quantity): Socks;
    public function decreaseQuantity(Socks $socks, $amount): void;
}
