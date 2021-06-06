<?php

namespace App\Http\Controllers\Api\Stock;

use App\Enums\StockMarketTypeEnum;
use App\Events\HistoryUpdateEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\StockOverviewResource;
use App\Http\Resources\StockResource;
use App\Http\Resources\StockResourceWithNews;
use App\Http\Resources\StocksHistoryResource;
use App\Models\HistoryUpdate;
use App\Models\Stock;
use App\Models\StockOverview;
use App\Models\StocksHistory;
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
                'current_page' => (int)$stocks->currentPage(),
                'last_page' => (int)$stocks->lastPage(),
                'previous_page' => (string)$stocks->previousPageUrl() ?: null,
                'next_page' => (string)$stocks->nextPageUrl() ?: null,
                'per_page' => (int)$stocks->perPage(),
                'total' => (int)$stocks->total(),
            ]
        ], 200);
    }

    public function test(){
        dd(Stock::find(1)->isUpdated());
    }
    /**
     * Display the specified resource.
     *
     * @param Stock $stock
     * @return JsonResponse
     */
    public function show(Stock $stock): JsonResponse
    {
        return response()->json([
            'result' => true,
            'stock' => new StockResourceWithNews($stock)
        ], 200);
    }
    /**
    * @return JsonResponse
    */
    public function getMarketList(): JsonResponse
    {
        return response()->json([
            'result' => true,
            'marketList' => StockMarketTypeEnum::toLabels()
        ], 200);
    }

    public function getStockHistory(Stock $stock): JsonResponse
    {
        return response()->json([
            'result' => true,
            'history' => $stock->getUpdates()
        ]);
    }
    public function viewStockUpdates(Stock $stock): JsonResponse
    {
        return response()->json([
            'result' => true,
            'viewed' => $stock->viewStockUpdates()
        ]);
    }

    public function getUpdatedColumns(Stock $stock): JsonResponse
    {
        return response()->json([
            'result' => true,
            'columns' => $stock->getUpdatedColumns()
        ]);
    }

    public function getHistory(Request $request): JsonResponse
    {
        $data = Stock::find($request->stock_id)->getStockFromHistory($request->except('stock_id'));

        return response()->json([
            'result' => true,
            'stock' => $data
        ]);
    }
}
