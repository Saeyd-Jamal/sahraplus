<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntertainmentGenerMappingRequest;
use App\Http\Resources\EntertainmentGenerMappingResource;
use App\Services\EntertainmentGenerMappingService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EntertainmentGenerMappingController extends Controller
{
    /**
     * @var EntertainmentGenerMappingService
     */
    protected EntertainmentGenerMappingService $entertainmentGenerMappingService;

    /**
     * DummyModel Constructor
     *
     * @param EntertainmentGenerMappingService $entertainmentGenerMappingService
     *
     */
    public function __construct(EntertainmentGenerMappingService $entertainmentGenerMappingService)
    {
        $this->entertainmentGenerMappingService = $entertainmentGenerMappingService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return EntertainmentGenerMappingResource::collection($this->entertainmentGenerMappingService->getAll());
    }

    public function store(EntertainmentGenerMappingRequest $request): EntertainmentGenerMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EntertainmentGenerMappingResource($this->entertainmentGenerMappingService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): EntertainmentGenerMappingResource
    {
        return EntertainmentGenerMappingResource::make($this->entertainmentGenerMappingService->getById($id));
    }

    public function update(EntertainmentGenerMappingRequest $request, int $id): EntertainmentGenerMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EntertainmentGenerMappingResource($this->entertainmentGenerMappingService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->entertainmentGenerMappingService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
