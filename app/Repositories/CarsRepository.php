<?php

namespace App\Repositories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CarsRepository
{
    public function getCars(): LengthAwarePaginator
    {
        return Car::query()->paginate(5);
    }

    public function store(array $data): Car
    {
        return Car::query()->create($data);

    }

    public function update(array $data, Car $car): Car
    {
        $car->update($data);
        return $car;
    }
}
