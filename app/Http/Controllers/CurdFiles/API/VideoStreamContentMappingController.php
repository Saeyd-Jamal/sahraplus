<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoStreamContentMappingRequest;
use App\Http\Resources\VideoStreamContentMappingResource;
use App\Services\VideoStreamContentMappingService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VideoStreamContentMappingController extends Controller
{
    /**
     * @var VideoStreamContentMappingService
     */
    protected VideoStreamContentMappingService $videoStreamContentMappingService;

    /**
     * DummyModel Constructor
     *
     * @param VideoStreamContentMappingService $videoStreamContentMappingService
     *
     */
    public function __construct(VideoStreamContentMappingService $videoStreamContentMappingService)
    {
        $this->videoStreamContentMappingService = $videoStreamContentMappingService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return VideoStreamContentMappingResource::collection($this->videoStreamContentMappingService->getAll());
    }

    public function store(VideoStreamContentMappingRequest $request): VideoStreamContentMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new VideoStreamContentMappingResource($this->videoStreamContentMappingService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): VideoStreamContentMappingResource
    {
        return VideoStreamContentMappingResource::make($this->videoStreamContentMappingService->getById($id));
    }

    public function update(VideoStreamContentMappingRequest $request, int $id): VideoStreamContentMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new VideoStreamContentMappingResource($this->videoStreamContentMappingService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->videoStreamContentMappingService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
