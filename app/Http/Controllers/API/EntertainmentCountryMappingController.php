<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntertainmentCountryMappingRequest;
use App\Http\Resources\EntertainmentCountryMappingResource;
use App\Services\EntertainmentCountryMappingService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EntertainmentCountryMappingController extends Controller
{
    /**
     * @var EntertainmentCountryMappingService
     */
    protected EntertainmentCountryMappingService $entertainmentCountryMappingService;

    /**
     * DummyModel Constructor
     *
     * @param EntertainmentCountryMappingService $entertainmentCountryMappingService
     *
     */
    public function __construct(EntertainmentCountryMappingService $entertainmentCountryMappingService)
    {
        $this->entertainmentCountryMappingService = $entertainmentCountryMappingService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return EntertainmentCountryMappingResource::collection($this->entertainmentCountryMappingService->getAll());
    }

    public function store(EntertainmentCountryMappingRequest $request): EntertainmentCountryMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EntertainmentCountryMappingResource($this->entertainmentCountryMappingService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): EntertainmentCountryMappingResource
    {
        return EntertainmentCountryMappingResource::make($this->entertainmentCountryMappingService->getById($id));
    }

    public function update(EntertainmentCountryMappingRequest $request, int $id): EntertainmentCountryMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EntertainmentCountryMappingResource($this->entertainmentCountryMappingService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->entertainmentCountryMappingService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
