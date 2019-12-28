<?php

namespace App\Http\Controllers;

use App\Entities\Costumer;
use App\Http\Requests\SalesRequest;
use App\Http\Resources\CostumerSalesCollection;
use Carbon\Carbon;

class CostumerSalesController extends Controller
{
    public function index(SalesRequest $request, $costumer_id)
    {
        return new CostumerSalesCollection(
            $this->salesBetween($request, $costumer_id)->get()
        );
    }

    /**
     * TO DO
     * Resource computing result data with collection
     */
    public function results(SalesRequest $request, $costumer_id)
    {
        return new CostumerSalesCollection(
            $this->salesBetween($request, $costumer_id)->get()
        );
    }

    private function salesBetween(SalesRequest $request, $costumer_id)
    {
        $costumer = Costumer::findOrFail($costumer_id);

        $startAt = new Carbon($request->get("from_date"));
        $endAt = new Carbon($request->get("to_date"));

        return $costumer->sales()
            ->with('product')
            ->whereBetween('date', [$startAt, $endAt]);
    }

    public function store(SalesRequest $request, $costumer_id)
    {
        $costumer = Costumer::findOrFail($costumer_id);

        $sale = $costumer->sales()->create([
            "product_id" => $request->get("product_id"),
            "status" => $request->get("status", 0),
            "price" => $request->get("price"),
            "amount" => $request->get("amount"),
            "discount" => $request->get("discount", 0),
            "date" => $request->get("date")
        ]);

        return response()->json($sale, 201);
    }


    public function update(SalesRequest $request, $costumer_id, $sale_id)
    {
        $costumer = Costumer::findOrFail($costumer_id);

        $sale = $costumer->sales()->whereId($sale_id)->first();

        $sale->update($request->all());

        return response()->json($sale, 200);
    }
}
