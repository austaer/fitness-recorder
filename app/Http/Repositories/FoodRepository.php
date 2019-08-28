<?php


namespace App\Http\Repositories;


use App\Http\Repositories\Interfaces\FoodRepositoryInterface;
use App\Model\FoodModel;

class FoodRepository implements FoodRepositoryInterface
{
    public function findAll(array $columns = ['*'])
    {
        return FoodModel::all($columns);
    }

    public function find($code, $seq)
    {
        return FoodModel::query()->where('food_code', $code)->where('food_seq', $seq)->first();
    }
}