<?php

namespace App\Http\Controllers\Api\Stock;

use App\Enums\StockMarketTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\StockOverviewResource;
use App\Http\Resources\StockResource;
use App\Models\Stock;
use App\Models\StockOverview;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StockController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $stocks = Stock::getAllWithFilter($request->all());

        return response()->json([
            'result' => true,
            'stocks' => StockResource::collection($stocks),
            'pagination' => [
                'current_page' => (int) $stocks->currentPage(),
                'last_page' => (int) $stocks->lastPage(),
                'previous_page' => (string) $stocks->previousPageUrl() ?: null,
                'next_page' => (string) $stocks->nextPageUrl() ?: null,
                'per_page' => (int) $stocks->perPage(),
                'total' => (int) $stocks->total(),
            ]
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  Stock  $stock
     * @return JsonResponse
     */
    public function show(Stock $stock): JsonResponse
    {
        return response()->json([
            'result' => true,
            'stock' => new StockResource($stock)
        ], 200);
    }
    /**
    * @return JsonResponse
    */
    public function getMarketList(): JsonResponse
    {

        return response()->json([
            'result' => true,
            'marketList' => collect(StockMarketTypeEnum::labels())->values()
        ], 200);
    }
}
