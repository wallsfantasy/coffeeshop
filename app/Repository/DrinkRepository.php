<?php

namespace App\Repository;

use App\Entities\Drink;

class DrinkRepository
{
    public function add(Drink $drink)
    {
        return $drink->save();
    }
}
