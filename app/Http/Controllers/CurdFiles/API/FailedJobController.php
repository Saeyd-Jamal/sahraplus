<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FailedJobRequest;
use App\Http\Resources\FailedJobResource;
use App\Services\FailedJobService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FailedJobController extends Controller
{
    /**
     * @var FailedJobService
     */
    protected FailedJobService $failedJobService;

    /**
     * DummyModel Constructor
     *
     * @param FailedJobService $failedJobService
     *
     */
    public function __construct(FailedJobService $failedJobService)
    {
        $this->failedJobService = $failedJobService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return FailedJobResource::collection($this->failedJobService->getAll());
    }

    public function store(FailedJobRequest $request): FailedJobResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new FailedJobResource($this->failedJobService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): FailedJobResource
    {
        return FailedJobResource::make($this->failedJobService->getById($id));
    }

    public function update(FailedJobRequest $request, int $id): FailedJobResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new FailedJobResource($this->failedJobService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->failedJobService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
