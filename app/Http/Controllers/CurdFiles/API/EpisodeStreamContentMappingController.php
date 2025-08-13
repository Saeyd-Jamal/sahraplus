<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodeStreamContentMappingRequest;
use App\Http\Resources\EpisodeStreamContentMappingResource;
use App\Services\EpisodeStreamContentMappingService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EpisodeStreamContentMappingController extends Controller
{
    /**
     * @var EpisodeStreamContentMappingService
     */
    protected EpisodeStreamContentMappingService $episodeStreamContentMappingService;

    /**
     * DummyModel Constructor
     *
     * @param EpisodeStreamContentMappingService $episodeStreamContentMappingService
     *
     */
    public function __construct(EpisodeStreamContentMappingService $episodeStreamContentMappingService)
    {
        $this->episodeStreamContentMappingService = $episodeStreamContentMappingService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return EpisodeStreamContentMappingResource::collection($this->episodeStreamContentMappingService->getAll());
    }

    public function store(EpisodeStreamContentMappingRequest $request): EpisodeStreamContentMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EpisodeStreamContentMappingResource($this->episodeStreamContentMappingService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): EpisodeStreamContentMappingResource
    {
        return EpisodeStreamContentMappingResource::make($this->episodeStreamContentMappingService->getById($id));
    }

    public function update(EpisodeStreamContentMappingRequest $request, int $id): EpisodeStreamContentMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EpisodeStreamContentMappingResource($this->episodeStreamContentMappingService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->episodeStreamContentMappingService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
