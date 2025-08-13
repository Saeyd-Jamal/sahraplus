<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobBatchRequest;
use App\Http\Resources\JobBatchResource;
use App\Services\JobBatchService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobBatchController extends Controller
{
    /**
     * @var JobBatchService
     */
    protected JobBatchService $jobBatchService;

    /**
     * DummyModel Constructor
     *
     * @param JobBatchService $jobBatchService
     *
     */
    public function __construct(JobBatchService $jobBatchService)
    {
        $this->jobBatchService = $jobBatchService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return JobBatchResource::collection($this->jobBatchService->getAll());
    }

    public function store(JobBatchRequest $request): JobBatchResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new JobBatchResource($this->jobBatchService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): JobBatchResource
    {
        return JobBatchResource::make($this->jobBatchService->getById($id));
    }

    public function update(JobBatchRequest $request, int $id): JobBatchResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new JobBatchResource($this->jobBatchService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->jobBatchService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
