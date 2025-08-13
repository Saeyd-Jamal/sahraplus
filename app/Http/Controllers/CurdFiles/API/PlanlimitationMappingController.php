<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanlimitationMappingRequest;
use App\Http\Resources\PlanlimitationMappingResource;
use App\Services\PlanlimitationMappingService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanlimitationMappingController extends Controller
{
    /**
     * @var PlanlimitationMappingService
     */
    protected PlanlimitationMappingService $planlimitationMappingService;

    /**
     * DummyModel Constructor
     *
     * @param PlanlimitationMappingService $planlimitationMappingService
     *
     */
    public function __construct(PlanlimitationMappingService $planlimitationMappingService)
    {
        $this->planlimitationMappingService = $planlimitationMappingService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return PlanlimitationMappingResource::collection($this->planlimitationMappingService->getAll());
    }

    public function store(PlanlimitationMappingRequest $request): PlanlimitationMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new PlanlimitationMappingResource($this->planlimitationMappingService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): PlanlimitationMappingResource
    {
        return PlanlimitationMappingResource::make($this->planlimitationMappingService->getById($id));
    }

    public function update(PlanlimitationMappingRequest $request, int $id): PlanlimitationMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new PlanlimitationMappingResource($this->planlimitationMappingService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->planlimitationMappingService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
