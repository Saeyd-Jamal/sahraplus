<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LiveTvStreamContentMappingRequest;
use App\Http\Resources\LiveTvStreamContentMappingResource;
use App\Services\LiveTvStreamContentMappingService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LiveTvStreamContentMappingController extends Controller
{
    /**
     * @var LiveTvStreamContentMappingService
     */
    protected LiveTvStreamContentMappingService $liveTvStreamContentMappingService;

    /**
     * DummyModel Constructor
     *
     * @param LiveTvStreamContentMappingService $liveTvStreamContentMappingService
     *
     */
    public function __construct(LiveTvStreamContentMappingService $liveTvStreamContentMappingService)
    {
        $this->liveTvStreamContentMappingService = $liveTvStreamContentMappingService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return LiveTvStreamContentMappingResource::collection($this->liveTvStreamContentMappingService->getAll());
    }

    public function store(LiveTvStreamContentMappingRequest $request): LiveTvStreamContentMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new LiveTvStreamContentMappingResource($this->liveTvStreamContentMappingService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): LiveTvStreamContentMappingResource
    {
        return LiveTvStreamContentMappingResource::make($this->liveTvStreamContentMappingService->getById($id));
    }

    public function update(LiveTvStreamContentMappingRequest $request, int $id): LiveTvStreamContentMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new LiveTvStreamContentMappingResource($this->liveTvStreamContentMappingService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->liveTvStreamContentMappingService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
