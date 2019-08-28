<?php


namespace App\Http\Controllers;


use App\Http\Repositories\Interfaces\FoodRepositoryInterface;

class FoodController extends Controller
{
    private $foodRepository;

    public function __construct(FoodRepositoryInterface $foodRepository)
    {
        $this->foodRepository = $foodRepository;
    }

    public function list()
    {
        return $this->foodRepository->findAll();
    }
}