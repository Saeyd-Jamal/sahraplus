<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoDownloadMappingRequest;
use App\Http\Resources\VideoDownloadMappingResource;
use App\Services\VideoDownloadMappingService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VideoDownloadMappingController extends Controller
{
    /**
     * @var VideoDownloadMappingService
     */
    protected VideoDownloadMappingService $videoDownloadMappingService;

    /**
     * DummyModel Constructor
     *
     * @param VideoDownloadMappingService $videoDownloadMappingService
     *
     */
    public function __construct(VideoDownloadMappingService $videoDownloadMappingService)
    {
        $this->videoDownloadMappingService = $videoDownloadMappingService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return VideoDownloadMappingResource::collection($this->videoDownloadMappingService->getAll());
    }

    public function store(VideoDownloadMappingRequest $request): VideoDownloadMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new VideoDownloadMappingResource($this->videoDownloadMappingService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): VideoDownloadMappingResource
    {
        return VideoDownloadMappingResource::make($this->videoDownloadMappingService->getById($id));
    }

    public function update(VideoDownloadMappingRequest $request, int $id): VideoDownloadMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new VideoDownloadMappingResource($this->videoDownloadMappingService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->videoDownloadMappingService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
