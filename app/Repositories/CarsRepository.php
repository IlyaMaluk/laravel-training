<?php

namespace App\Repositories;

use App\Enums\CarsPageSpecs;
use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CarsRepository
{
    public function getCars(): LengthAwarePaginator
    {
        return Car::query()->paginate(CarsPageSpecs::Elements->value);
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

    public function delete(Car $car): Car
    {
        $car->delete();
        return $car;
    }
}
