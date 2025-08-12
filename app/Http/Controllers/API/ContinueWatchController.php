<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContinueWatchRequest;
use App\Http\Resources\ContinueWatchResource;
use App\Services\ContinueWatchService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContinueWatchController extends Controller
{
    /**
     * @var ContinueWatchService
     */
    protected ContinueWatchService $continueWatchService;

    /**
     * DummyModel Constructor
     *
     * @param ContinueWatchService $continueWatchService
     *
     */
    public function __construct(ContinueWatchService $continueWatchService)
    {
        $this->continueWatchService = $continueWatchService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ContinueWatchResource::collection($this->continueWatchService->getAll());
    }

    public function store(ContinueWatchRequest $request): ContinueWatchResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new ContinueWatchResource($this->continueWatchService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): ContinueWatchResource
    {
        return ContinueWatchResource::make($this->continueWatchService->getById($id));
    }

    public function update(ContinueWatchRequest $request, int $id): ContinueWatchResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new ContinueWatchResource($this->continueWatchService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->continueWatchService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
