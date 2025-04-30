<?php

namespace App\Contracts;

use Illuminate\Http\Response;

interface SocksServiceContract
{
    public function registerGoods($color, $cottonPart, $quantity);

    public function releaseGoods($color, $cottonPart, $quantity);
    public function getMathOperation($operation): string;
}
