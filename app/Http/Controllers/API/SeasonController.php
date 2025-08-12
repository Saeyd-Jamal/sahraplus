<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeasonRequest;
use App\Http\Resources\SeasonResource;
use App\Services\SeasonService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeasonController extends Controller
{
    /**
     * @var SeasonService
     */
    protected SeasonService $seasonService;

    /**
     * DummyModel Constructor
     *
     * @param SeasonService $seasonService
     *
     */
    public function __construct(SeasonService $seasonService)
    {
        $this->seasonService = $seasonService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return SeasonResource::collection($this->seasonService->getAll());
    }

    public function store(SeasonRequest $request): SeasonResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new SeasonResource($this->seasonService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): SeasonResource
    {
        return SeasonResource::make($this->seasonService->getById($id));
    }

    public function update(SeasonRequest $request, int $id): SeasonResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new SeasonResource($this->seasonService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->seasonService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
