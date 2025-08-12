<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\WatchlistRequest;
use App\Http\Resources\WatchlistResource;
use App\Services\WatchlistService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WatchlistController extends Controller
{
    /**
     * @var WatchlistService
     */
    protected WatchlistService $watchlistService;

    /**
     * DummyModel Constructor
     *
     * @param WatchlistService $watchlistService
     *
     */
    public function __construct(WatchlistService $watchlistService)
    {
        $this->watchlistService = $watchlistService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return WatchlistResource::collection($this->watchlistService->getAll());
    }

    public function store(WatchlistRequest $request): WatchlistResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new WatchlistResource($this->watchlistService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): WatchlistResource
    {
        return WatchlistResource::make($this->watchlistService->getById($id));
    }

    public function update(WatchlistRequest $request, int $id): WatchlistResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new WatchlistResource($this->watchlistService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->watchlistService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
