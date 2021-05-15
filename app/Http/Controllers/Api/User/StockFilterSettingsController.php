<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveStockFilterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Lang;

class StockFilterSettingsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param SaveStockFilterRequest $request
     * @return JsonResponse
     */
    public function __invoke(SaveStockFilterRequest $request): JsonResponse
    {
        $user = auth()->user();
        $user->stockFilter()->update((array) $request->validated());

        return response()->json([
            'result' => true,
            'stock_filter' => auth()->user()->stockFilter,
            'message' => Lang::get('stock_filter.update.success')
        ], 200);
    }
}
