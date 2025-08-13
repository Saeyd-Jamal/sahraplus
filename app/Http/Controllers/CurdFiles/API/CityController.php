<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Http\Resources\CityResource;
use App\Services\CityService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{
    /**
     * @var CityService
     */
    protected CityService $cityService;

    /**
     * DummyModel Constructor
     *
     * @param CityService $cityService
     *
     */
    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return CityResource::collection($this->cityService->getAll());
    }

    public function store(CityRequest $request): CityResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new CityResource($this->cityService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): CityResource
    {
        return CityResource::make($this->cityService->getById($id));
    }

    public function update(CityRequest $request, int $id): CityResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new CityResource($this->cityService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->cityService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
