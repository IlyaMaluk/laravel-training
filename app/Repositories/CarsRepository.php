<?php

namespace App\Repositories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;

class CarsRepository
{
    public function getCars(): Collection
    {
        return Car::all();
    }

    public function store(array $data): Car
    {
        return Car::query()->create($data);

    }
}
