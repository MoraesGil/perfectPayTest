<?php

namespace App\Http\Controllers;

use App\Entities\Costumer;

class CostumerController extends Controller
{
    public function index(){
        return Costumer::all();
    }
}
