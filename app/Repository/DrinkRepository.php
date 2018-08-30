<?php

namespace App\Repository;

use App\Entities\Drink;

class DrinkRepository
{
    public function add(Drink $drink): bool
    {
        return $drink->save();
    }

    public function remove(int $id): bool
    {
        return (bool) Drink::destroy($id);
    }
}
