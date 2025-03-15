<?php

namespace App\Repositories;

use App\interface\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
use Filament\Forms\Components\Builder;

class BoardingHosuseRepository implements BoardingHouseRepositoryInterface
{
    public function getAllBoardingHouses($search = null, $location = null, $category = null)
    {
        $query = BoardingHouse::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($location) {
            $query->whereHas('lokasi', function (Builder $query) use ($location) {
                $query->where('slug', $location);
            });
        }

        if ($category) {
            $query->whereHas('kategori', function (Builder $query) use ($category) {
                $query->where('slug', $category);
            });
        }
        return $query->get();
    }

    public function getPopularBoardingHouses($limit = 5)
    {
        return BoardingHouse::withCount('transactions')->orderBy('transactions_count', 'desc')->take($limit)->get();
    }

    public function getBoardingHouseByLocationSlug($slug)
    {
        return BoardingHouse::whereHas('lokasi', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseByCategorySlug($slug)
    {
        return BoardingHouse::whereHas('kategori', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseBySlug($slug)
    {
        return BoardingHouse::whereHas('slug', $slug)->first();
    }
}
