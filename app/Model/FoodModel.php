<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FoodModel
 * @package App\Model
 *
 * @property string $food_code
 * @property string $food_seq
 * @property string $food_name
 * @property float $food_kcal
 */
class FoodModel extends Model
{
    //
    protected $table = 'food';

    protected $attributes = [];
}
