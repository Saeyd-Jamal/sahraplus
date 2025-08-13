<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentLikeRequest;
use App\Http\Resources\CommentLikeResource;
use App\Services\CommentLikeService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentLikeController extends Controller
{
    /**
     * @var CommentLikeService
     */
    protected CommentLikeService $commentLikeService;

    /**
     * DummyModel Constructor
     *
     * @param CommentLikeService $commentLikeService
     *
     */
    public function __construct(CommentLikeService $commentLikeService)
    {
        $this->commentLikeService = $commentLikeService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return CommentLikeResource::collection($this->commentLikeService->getAll());
    }

    public function store(CommentLikeRequest $request): CommentLikeResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new CommentLikeResource($this->commentLikeService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): CommentLikeResource
    {
        return CommentLikeResource::make($this->commentLikeService->getById($id));
    }

    public function update(CommentLikeRequest $request, int $id): CommentLikeResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new CommentLikeResource($this->commentLikeService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->commentLikeService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
