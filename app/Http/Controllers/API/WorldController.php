<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorldRequest;
use App\Http\Resources\WorldResource;
use App\Services\WorldService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorldController extends Controller
{
    /**
     * @var WorldService
     */
    protected WorldService $worldService;

    /**
     * DummyModel Constructor
     *
     * @param WorldService $worldService
     *
     */
    public function __construct(WorldService $worldService)
    {
        $this->worldService = $worldService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return WorldResource::collection($this->worldService->getAll());
    }

    public function store(WorldRequest $request): WorldResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new WorldResource($this->worldService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): WorldResource
    {
        return WorldResource::make($this->worldService->getById($id));
    }

    public function update(WorldRequest $request, int $id): WorldResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new WorldResource($this->worldService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->worldService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
