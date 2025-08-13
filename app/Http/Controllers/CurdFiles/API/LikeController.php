<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LikeRequest;
use App\Http\Resources\LikeResource;
use App\Services\LikeService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends Controller
{
    /**
     * @var LikeService
     */
    protected LikeService $likeService;

    /**
     * DummyModel Constructor
     *
     * @param LikeService $likeService
     *
     */
    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return LikeResource::collection($this->likeService->getAll());
    }

    public function store(LikeRequest $request): LikeResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new LikeResource($this->likeService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): LikeResource
    {
        return LikeResource::make($this->likeService->getById($id));
    }

    public function update(LikeRequest $request, int $id): LikeResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new LikeResource($this->likeService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->likeService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
