<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
