<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LiveTvCategoryRequest;
use App\Http\Resources\LiveTvCategoryResource;
use App\Services\LiveTvCategoryService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LiveTvCategoryController extends Controller
{
    /**
     * @var LiveTvCategoryService
     */
    protected LiveTvCategoryService $liveTvCategoryService;

    /**
     * DummyModel Constructor
     *
     * @param LiveTvCategoryService $liveTvCategoryService
     *
     */
    public function __construct(LiveTvCategoryService $liveTvCategoryService)
    {
        $this->liveTvCategoryService = $liveTvCategoryService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return LiveTvCategoryResource::collection($this->liveTvCategoryService->getAll());
    }

    public function store(LiveTvCategoryRequest $request): LiveTvCategoryResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new LiveTvCategoryResource($this->liveTvCategoryService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): LiveTvCategoryResource
    {
        return LiveTvCategoryResource::make($this->liveTvCategoryService->getById($id));
    }

    public function update(LiveTvCategoryRequest $request, int $id): LiveTvCategoryResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new LiveTvCategoryResource($this->liveTvCategoryService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->liveTvCategoryService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
