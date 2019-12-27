<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CostumerSales extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "sale_id" => $this->id,
            "sale_status" => $this->status,
            "sale_price"=> $this->price,
            "sale_discount" => $this->discount,
            "sale_price_final" => number_format((float) $this->price - $this->discount, 2, '.', ''),
            "sale_date " => $this->date,
            "sale_amount" => $this->amount,
            "sale_product" => $this->whenLoaded('product')
        ];
        return parent::toArray($request);
    }
}
