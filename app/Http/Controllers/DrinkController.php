<?php

namespace App\Http\Controllers;

use App\Entities\Drink;

class DrinkController extends Controller
{
    public function listDrinks()
    {
        $drinks = Drink::all();

        return view('drinks.list', ['drinks' => $drinks]);
    }
}
