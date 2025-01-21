<?php

namespace App\Services;

use App\Http\Requests\CreateCarRequest;
use App\Models\Car;
use App\Repositories\CarsRepository;
use Illuminate\Database\Eloquent\Collection;

class CarsService
{
    public function __construct(
        private CarsRepository $carsRepository,
    )
    {
    }

    public function getCars(): Collection
    {
        return $this->carsRepository->getCars();
    }

    public function createCar(array $data): Car
    {
        return $this->carsRepository->store($data);
    }
}
