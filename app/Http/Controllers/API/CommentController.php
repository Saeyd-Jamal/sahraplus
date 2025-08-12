<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    /**
     * @var CommentService
     */
    protected CommentService $commentService;

    /**
     * DummyModel Constructor
     *
     * @param CommentService $commentService
     *
     */
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return CommentResource::collection($this->commentService->getAll());
    }

    public function store(CommentRequest $request): CommentResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new CommentResource($this->commentService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): CommentResource
    {
        return CommentResource::make($this->commentService->getById($id));
    }

    public function update(CommentRequest $request, int $id): CommentResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new CommentResource($this->commentService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->commentService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
