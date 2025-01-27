<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
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
        return response()->json($this->carsService->getCars());
    }

    public function store(CreateCarRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $car = $this->carsService->createCar($validatedData);

        return response()->json([
            'data' => $car,
        ], ResponseAlias::HTTP_CREATED);
    }

    public function update(UpdateCarRequest $request, Car $car): JsonResponse
    {
        $validatedData = $request->validated();

        $car = $this->carsService->updateCar($validatedData, $car);

        return response ()->json([
            'car' => $this->carsService->updateCar($validatedData, $car),
        ]);
    }
}
