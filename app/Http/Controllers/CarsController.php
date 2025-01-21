<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarRequest;
use App\Services\CarsService;
use Illuminate\Http\JsonResponse;

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
            'data'    => $car,
        ], 201);
    }
}
