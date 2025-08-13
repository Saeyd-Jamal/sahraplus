<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\WatchHistoryRequest;
use App\Http\Resources\WatchHistoryResource;
use App\Services\WatchHistoryService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WatchHistoryController extends Controller
{
    /**
     * @var WatchHistoryService
     */
    protected WatchHistoryService $watchHistoryService;

    /**
     * DummyModel Constructor
     *
     * @param WatchHistoryService $watchHistoryService
     *
     */
    public function __construct(WatchHistoryService $watchHistoryService)
    {
        $this->watchHistoryService = $watchHistoryService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return WatchHistoryResource::collection($this->watchHistoryService->getAll());
    }

    public function store(WatchHistoryRequest $request): WatchHistoryResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new WatchHistoryResource($this->watchHistoryService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): WatchHistoryResource
    {
        return WatchHistoryResource::make($this->watchHistoryService->getById($id));
    }

    public function update(WatchHistoryRequest $request, int $id): WatchHistoryResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new WatchHistoryResource($this->watchHistoryService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->watchHistoryService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
