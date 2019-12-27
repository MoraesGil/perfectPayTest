<?php

namespace App\Http\Controllers;

use App\Entities\Costumer;
use App\Entities\Sale;
use App\Http\Requests\SalesRequest;
use App\Http\Resources\CostumerSalesCollection;
use Carbon\Carbon;

class CostumerSalesController extends Controller
{
    public function index(SalesRequest $request, $costumer_id)
    {
        $costumer = Costumer::findOrFail($costumer_id);

        $startAt = new Carbon($request->get("from_date"));
        $endAt = new Carbon($request->get("to_date"));

        return new CostumerSalesCollection(
            $costumer->sales()
                ->with('product')
                ->whereBetween('date', [$startAt, $endAt])->get()
        );
    }

    public function update(SalesRequest $request, $costumer_id)
    {
        $costumer = Costumer::findOrFail($costumer_id);

        Sale::updateOrCreate([
            "product_id" => $request->get("product_id"),
            "costumer_id" => $costumer->id,
            "status" => $request->get("status",0),
            "price" => $request->get("price"),
            "amount" => $request->get("amount"),
            "discount" => $request->get("discount"),
            "date" => $request->get("date")
        ]);
    }
}
