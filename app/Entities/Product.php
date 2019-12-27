<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Sales;

class Product extends Model
{
    protected $fillable = ['name','data', 'price', 'description'];
    public $timestamps = false;

    public function sales()
    {
        return $this->hasMany(Sales::class);
    }


}
