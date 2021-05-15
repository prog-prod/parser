<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\DashboardResource;
use App\Models\Stock;

class DashboardController extends Controller
{
    
    public function dashboard(Request $request)
    {
    	
    	$query = Stock::where('price', '<=', 0.05)->orderBy($request->column, $request->order);

        $stocks = $query->paginate($request->per_page);

    	return DashboardResource::collection($stocks);
    }
}
