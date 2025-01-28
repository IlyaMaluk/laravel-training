<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Repositories\CarsRepository;
use App\Services\CarsService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CarsController extends Controller
{
    public function __construct(
        protected CarsService $carsService,
    )
    {
    }

    public function index(): JsonResponse
    {
        return response()->json(CarResource::collection($this->carsService->getCars()));
    }

    public function store(CreateCarRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $car = $this->carsService->createCar($validatedData);

        return response()->json(new CarResource($car), ResponseAlias::HTTP_CREATED);
    }

    public function update(UpdateCarRequest $request, Car $car): JsonResponse
    {
        $validatedData = $request->validated();

        $car = $this->carsService->updateCar($validatedData, $car);

        return response ()->json([
            'car' => $this->carsService->updateCar($validatedData, $car),
        ]);
    }

    public function destroy(Car $car): JsonResponse
    {
        $car = $this->carsService->deleteCar($car);
        return response()->json(new CarResource($car), ResponseAlias::HTTP_NO_CONTENT);
    }
}
