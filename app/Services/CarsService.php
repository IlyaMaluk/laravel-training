<?php

namespace App\Services;

use App\Models\Car;
use App\Repositories\CarsRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CarsService
{
    public function __construct(
        private CarsRepository $carsRepository,
    )
    {
    }

    public function getCars(): LengthAwarePaginator
    {
        return $this->carsRepository->getCars();
    }

    public function createCar(array $data): Car
    {
        return $this->carsRepository->store($data);
    }

    public function updateCar(array $data, Car $car): Car
    {
        return $this->carsRepository->update($data, $car);
    }

    public function deleteCar(Car $car): Car
    {
        return $this->carsRepository->delete($car);
    }
}
