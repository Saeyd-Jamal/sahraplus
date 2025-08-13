<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntertainmentRequest;
use App\Http\Resources\EntertainmentResource;
use App\Services\EntertainmentService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EntertainmentController extends Controller
{
    /**
     * @var EntertainmentService
     */
    protected EntertainmentService $entertainmentService;

    /**
     * DummyModel Constructor
     *
     * @param EntertainmentService $entertainmentService
     *
     */
    public function __construct(EntertainmentService $entertainmentService)
    {
        $this->entertainmentService = $entertainmentService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return EntertainmentResource::collection($this->entertainmentService->getAll());
    }

    public function store(EntertainmentRequest $request): EntertainmentResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EntertainmentResource($this->entertainmentService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): EntertainmentResource
    {
        return EntertainmentResource::make($this->entertainmentService->getById($id));
    }

    public function update(EntertainmentRequest $request, int $id): EntertainmentResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EntertainmentResource($this->entertainmentService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->entertainmentService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
