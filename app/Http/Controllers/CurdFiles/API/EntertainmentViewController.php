<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntertainmentViewRequest;
use App\Http\Resources\EntertainmentViewResource;
use App\Services\EntertainmentViewService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EntertainmentViewController extends Controller
{
    /**
     * @var EntertainmentViewService
     */
    protected EntertainmentViewService $entertainmentViewService;

    /**
     * DummyModel Constructor
     *
     * @param EntertainmentViewService $entertainmentViewService
     *
     */
    public function __construct(EntertainmentViewService $entertainmentViewService)
    {
        $this->entertainmentViewService = $entertainmentViewService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return EntertainmentViewResource::collection($this->entertainmentViewService->getAll());
    }

    public function store(EntertainmentViewRequest $request): EntertainmentViewResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EntertainmentViewResource($this->entertainmentViewService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): EntertainmentViewResource
    {
        return EntertainmentViewResource::make($this->entertainmentViewService->getById($id));
    }

    public function update(EntertainmentViewRequest $request, int $id): EntertainmentViewResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EntertainmentViewResource($this->entertainmentViewService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->entertainmentViewService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
