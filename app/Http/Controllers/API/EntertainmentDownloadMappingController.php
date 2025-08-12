<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntertainmentDownloadMappingRequest;
use App\Http\Resources\EntertainmentDownloadMappingResource;
use App\Services\EntertainmentDownloadMappingService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EntertainmentDownloadMappingController extends Controller
{
    /**
     * @var EntertainmentDownloadMappingService
     */
    protected EntertainmentDownloadMappingService $entertainmentDownloadMappingService;

    /**
     * DummyModel Constructor
     *
     * @param EntertainmentDownloadMappingService $entertainmentDownloadMappingService
     *
     */
    public function __construct(EntertainmentDownloadMappingService $entertainmentDownloadMappingService)
    {
        $this->entertainmentDownloadMappingService = $entertainmentDownloadMappingService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return EntertainmentDownloadMappingResource::collection($this->entertainmentDownloadMappingService->getAll());
    }

    public function store(EntertainmentDownloadMappingRequest $request): EntertainmentDownloadMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EntertainmentDownloadMappingResource($this->entertainmentDownloadMappingService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): EntertainmentDownloadMappingResource
    {
        return EntertainmentDownloadMappingResource::make($this->entertainmentDownloadMappingService->getById($id));
    }

    public function update(EntertainmentDownloadMappingRequest $request, int $id): EntertainmentDownloadMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EntertainmentDownloadMappingResource($this->entertainmentDownloadMappingService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->entertainmentDownloadMappingService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
