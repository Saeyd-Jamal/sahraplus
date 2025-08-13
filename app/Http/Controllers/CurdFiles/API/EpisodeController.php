<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodeRequest;
use App\Http\Resources\EpisodeResource;
use App\Services\EpisodeService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EpisodeController extends Controller
{
    /**
     * @var EpisodeService
     */
    protected EpisodeService $episodeService;

    /**
     * DummyModel Constructor
     *
     * @param EpisodeService $episodeService
     *
     */
    public function __construct(EpisodeService $episodeService)
    {
        $this->episodeService = $episodeService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return EpisodeResource::collection($this->episodeService->getAll());
    }

    public function store(EpisodeRequest $request): EpisodeResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EpisodeResource($this->episodeService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): EpisodeResource
    {
        return EpisodeResource::make($this->episodeService->getById($id));
    }

    public function update(EpisodeRequest $request, int $id): EpisodeResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EpisodeResource($this->episodeService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->episodeService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
