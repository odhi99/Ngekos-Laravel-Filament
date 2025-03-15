<?php

namespace App\Http\Controllers;

use App\interface\BoardingHouseRepositoryInterface;
use App\interface\CategoryRepositoryInterface;
use App\interface\LocationRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private LocationRepositoryInterface $locationRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        LocationRepositoryInterface $locationRepository,
        CategoryRepositoryInterface $categoryRepository,
        BoardingHouseRepositoryInterface $boardingHouseRepository,
    ) {
        $this->locationRepository = $locationRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    public function index()
    {
        return view('pages.home');
    }
}
