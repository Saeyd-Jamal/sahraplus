<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Services\ReviewService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends Controller
{
    /**
     * @var ReviewService
     */
    protected ReviewService $reviewService;

    /**
     * DummyModel Constructor
     *
     * @param ReviewService $reviewService
     *
     */
    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ReviewResource::collection($this->reviewService->getAll());
    }

    public function store(ReviewRequest $request): ReviewResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new ReviewResource($this->reviewService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): ReviewResource
    {
        return ReviewResource::make($this->reviewService->getById($id));
    }

    public function update(ReviewRequest $request, int $id): ReviewResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new ReviewResource($this->reviewService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->reviewService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
