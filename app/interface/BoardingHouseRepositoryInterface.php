<?php

namespace App\interface;

interface BoardingHouseRepositoryInterface
{
    public function getAllBoardingHouses($search = null, $location = null, $category = null);

    public function getPopularBoardingHouses($limit = 5);

    public function getBoardingHouseByLocationSlug($slug);

    public function getBoardingHouseByCategorySlug($slug);

    public function getBoardingHouseBySlug($slug);
}
