<?php

namespace App\Http\Controllers;

use App\Entities\Drink;
use App\Http\Requests\AddDrinkRequest;
use App\Http\Requests\RemoveDrinkRequest;
use App\Repository\DrinkRepository;
use Illuminate\Support\Facades\URL;

class DrinkController extends Controller
{
    public function listDrinks()
    {
        $drinks = Drink::all();

        return view('drinks.list', ['drinks' => $drinks]);
    }

    public function showAddDrink()
    {
        return view('drinks.add');
    }

    public function postAddDrink(AddDrinkRequest $request, DrinkRepository $repository)
    {
        $drink = new Drink([
            'name' => $request->request->get('name'),
            'price' => $request->request->get('price'),
        ]);

        $repository->add($drink);

        return redirect(URL::route('drink.list'));
    }

    public function postRemoveDrink(RemoveDrinkRequest $request, DrinkRepository $repository)
    {
        $repository->remove($request->request->get('id'));

        return redirect(URL::route('drink.list'));
    }
}
