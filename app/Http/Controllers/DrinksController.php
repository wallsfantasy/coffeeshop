<?php

namespace App\Http\Controllers;

use App\Entities\Drink;

class DrinksController extends Controller
{
    public function listDrinks()
    {
        $drinks = Drink::all();

        return view('drinks.list', ['drinks' => $drinks]);
    }
}
