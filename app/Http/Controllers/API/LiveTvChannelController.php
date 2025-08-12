<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LiveTvChannelRequest;
use App\Http\Resources\LiveTvChannelResource;
use App\Services\LiveTvChannelService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LiveTvChannelController extends Controller
{
    /**
     * @var LiveTvChannelService
     */
    protected LiveTvChannelService $liveTvChannelService;

    /**
     * DummyModel Constructor
     *
     * @param LiveTvChannelService $liveTvChannelService
     *
     */
    public function __construct(LiveTvChannelService $liveTvChannelService)
    {
        $this->liveTvChannelService = $liveTvChannelService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return LiveTvChannelResource::collection($this->liveTvChannelService->getAll());
    }

    public function store(LiveTvChannelRequest $request): LiveTvChannelResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new LiveTvChannelResource($this->liveTvChannelService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): LiveTvChannelResource
    {
        return LiveTvChannelResource::make($this->liveTvChannelService->getById($id));
    }

    public function update(LiveTvChannelRequest $request, int $id): LiveTvChannelResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new LiveTvChannelResource($this->liveTvChannelService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->liveTvChannelService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
