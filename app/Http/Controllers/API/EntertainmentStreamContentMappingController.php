<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntertainmentStreamContentMappingRequest;
use App\Http\Resources\EntertainmentStreamContentMappingResource;
use App\Services\EntertainmentStreamContentMappingService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EntertainmentStreamContentMappingController extends Controller
{
    /**
     * @var EntertainmentStreamContentMappingService
     */
    protected EntertainmentStreamContentMappingService $entertainmentStreamContentMappingService;

    /**
     * DummyModel Constructor
     *
     * @param EntertainmentStreamContentMappingService $entertainmentStreamContentMappingService
     *
     */
    public function __construct(EntertainmentStreamContentMappingService $entertainmentStreamContentMappingService)
    {
        $this->entertainmentStreamContentMappingService = $entertainmentStreamContentMappingService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return EntertainmentStreamContentMappingResource::collection($this->entertainmentStreamContentMappingService->getAll());
    }

    public function store(EntertainmentStreamContentMappingRequest $request): EntertainmentStreamContentMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EntertainmentStreamContentMappingResource($this->entertainmentStreamContentMappingService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): EntertainmentStreamContentMappingResource
    {
        return EntertainmentStreamContentMappingResource::make($this->entertainmentStreamContentMappingService->getById($id));
    }

    public function update(EntertainmentStreamContentMappingRequest $request, int $id): EntertainmentStreamContentMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EntertainmentStreamContentMappingResource($this->entertainmentStreamContentMappingService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->entertainmentStreamContentMappingService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
