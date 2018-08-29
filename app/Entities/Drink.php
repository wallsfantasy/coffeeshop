<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $price
 */
class Drink extends Model
{
    protected $table = 'drinks';
}
