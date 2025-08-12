<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntertainmentTalentMappingRequest;
use App\Http\Resources\EntertainmentTalentMappingResource;
use App\Services\EntertainmentTalentMappingService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EntertainmentTalentMappingController extends Controller
{
    /**
     * @var EntertainmentTalentMappingService
     */
    protected EntertainmentTalentMappingService $entertainmentTalentMappingService;

    /**
     * DummyModel Constructor
     *
     * @param EntertainmentTalentMappingService $entertainmentTalentMappingService
     *
     */
    public function __construct(EntertainmentTalentMappingService $entertainmentTalentMappingService)
    {
        $this->entertainmentTalentMappingService = $entertainmentTalentMappingService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return EntertainmentTalentMappingResource::collection($this->entertainmentTalentMappingService->getAll());
    }

    public function store(EntertainmentTalentMappingRequest $request): EntertainmentTalentMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EntertainmentTalentMappingResource($this->entertainmentTalentMappingService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): EntertainmentTalentMappingResource
    {
        return EntertainmentTalentMappingResource::make($this->entertainmentTalentMappingService->getById($id));
    }

    public function update(EntertainmentTalentMappingRequest $request, int $id): EntertainmentTalentMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EntertainmentTalentMappingResource($this->entertainmentTalentMappingService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->entertainmentTalentMappingService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
