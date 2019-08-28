<?php


namespace App\Http\Repositories\Interfaces;


interface FoodRepositoryInterface
{
    public function findAll(array $columns = []);
    public function find($code, $seq);
}