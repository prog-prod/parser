<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\StockResource;
use App\Http\Resources\StockOverviewResource;
use App\Models\Stock;
use App\Models\StockOverview;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function dashboard(Request $request): JsonResponse
    {
        $stockFilter = auth()->user()->stockFilter;

    	$stocks = Stock::priceRange([$stockFilter->min_price, $stockFilter->max_price])
            ->orderBy($request->column ?? 'created_at', $request->order ?? 'desc')
            ->paginate($request->per_page ?? 20);

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

    public function stock($symbol): JsonResponse
    {
        $stock = StockOverview::where('symbol', $symbol)->first();

        if (is_null($stock)) {
            
            return response()->json([
                'result' => false
            ], 404);
        }

        return response()->json([
            'result' => true,
            'stock' => new StockOverviewResource($stock)
        ], 200);
    }
}
