<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LivetvRequest;
use App\Http\Resources\LivetvResource;
use App\Services\LivetvService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LivetvController extends Controller
{
    /**
     * @var LivetvService
     */
    protected LivetvService $livetvService;

    /**
     * DummyModel Constructor
     *
     * @param LivetvService $livetvService
     *
     */
    public function __construct(LivetvService $livetvService)
    {
        $this->livetvService = $livetvService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return LivetvResource::collection($this->livetvService->getAll());
    }

    public function store(LivetvRequest $request): LivetvResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new LivetvResource($this->livetvService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): LivetvResource
    {
        return LivetvResource::make($this->livetvService->getById($id));
    }

    public function update(LivetvRequest $request, int $id): LivetvResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new LivetvResource($this->livetvService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->livetvService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
