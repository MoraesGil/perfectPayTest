<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Product;
use App\Entities\Costumer;

class Sale extends Model
{
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = ['product_id','status', 'price', 'amount', 'discount', 'date'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }
}
