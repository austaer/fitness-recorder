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
        return view('food-list', ['foodList' => $this->foodRepository->findAll(), 'info' => [
            'NAME' => '樣品名稱',
            'SEQ' => '整合編號',
            'KCAL' => '熱量(kcal)',
        ]]);
    }
}