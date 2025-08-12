<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodeDownloadMappingRequest;
use App\Http\Resources\EpisodeDownloadMappingResource;
use App\Services\EpisodeDownloadMappingService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EpisodeDownloadMappingController extends Controller
{
    /**
     * @var EpisodeDownloadMappingService
     */
    protected EpisodeDownloadMappingService $episodeDownloadMappingService;

    /**
     * DummyModel Constructor
     *
     * @param EpisodeDownloadMappingService $episodeDownloadMappingService
     *
     */
    public function __construct(EpisodeDownloadMappingService $episodeDownloadMappingService)
    {
        $this->episodeDownloadMappingService = $episodeDownloadMappingService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return EpisodeDownloadMappingResource::collection($this->episodeDownloadMappingService->getAll());
    }

    public function store(EpisodeDownloadMappingRequest $request): EpisodeDownloadMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EpisodeDownloadMappingResource($this->episodeDownloadMappingService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): EpisodeDownloadMappingResource
    {
        return EpisodeDownloadMappingResource::make($this->episodeDownloadMappingService->getById($id));
    }

    public function update(EpisodeDownloadMappingRequest $request, int $id): EpisodeDownloadMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EpisodeDownloadMappingResource($this->episodeDownloadMappingService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->episodeDownloadMappingService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
