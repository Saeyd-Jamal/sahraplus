<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Http\Resources\VideoResource;
use App\Services\VideoService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VideoController extends Controller
{
    /**
     * @var VideoService
     */
    protected VideoService $videoService;

    /**
     * DummyModel Constructor
     *
     * @param VideoService $videoService
     *
     */
    public function __construct(VideoService $videoService)
    {
        $this->videoService = $videoService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return VideoResource::collection($this->videoService->getAll());
    }

    public function store(VideoRequest $request): VideoResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new VideoResource($this->videoService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): VideoResource
    {
        return VideoResource::make($this->videoService->getById($id));
    }

    public function update(VideoRequest $request, int $id): VideoResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new VideoResource($this->videoService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->videoService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
