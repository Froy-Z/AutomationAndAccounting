<?php

namespace App\Http\Controllers;

use App\Contracts\SocksRepositoryContract;
use App\Contracts\SocksServiceContract;
use App\Exceptions\SocksException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SocksController extends Controller
{
    public function __construct(
        private readonly SocksServiceContract    $socksService,
        private readonly SocksRepositoryContract $socksRepository
    )
    {
    }

    public function index(Request $request): string|Response
    {
        try {
            $validated = $request->validate([
                'color' => 'required|string',
                'operation' => 'required|in:moreThan,lessThan,equal',
                'cottonPart' => 'required|integer|min:0|max:100',
            ]);

            $operation = $this->socksService->getMathOperation($request['operation']);
            $quantity = $this->socksRepository->getSumForParameter($validated['color'], $operation, $validated['cottonPart']);

            return response((string)$quantity, 200);
        } catch (\Throwable $e) {
            return response([
                'message' => 'Некорректный запрос',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function income(Request $request): string|Response
    {
        try {
            $validated = $request->validate([
                'color' => 'required|string',
                'cottonPart' => 'required|integer|min:0|max:100',
                'quantity' => 'required|integer|min:1',
            ]);

            $this->socksService->registerGoods(
                $validated['color'],
                $validated['cottonPart'],
                $validated['quantity']
            );

            return response(['message' => 'Товар успешно оприходован'], 200);
        } catch (\Throwable $e) {
            return response([
                'message' => 'Ошибка оприходывания',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function outcome(Request $request): string|Response
    {
        try {
            $validated = $request->validate([
                'color' => 'required|string',
                'cottonPart' => 'required|integer|min:0|max:100',
                'quantity' => 'required|integer|min:1',
            ]);

            $socks = $this->socksService->releaseGoods(
                $validated['color'],
                $validated['cottonPart'],
                $validated['quantity']
            );

            if (!$socks) {
                return response(['message' => 'Недостаточно носков'], 400);
            }

            return response(['message' => 'Успешный отпуск товара'], 200);
        } catch (\Throwable $e) {
            return response([
                'message' => 'Ошибка при отпуске товара',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}

