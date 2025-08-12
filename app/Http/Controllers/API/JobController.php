<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Http\Resources\JobResource;
use App\Services\JobService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobController extends Controller
{
    /**
     * @var JobService
     */
    protected JobService $jobService;

    /**
     * DummyModel Constructor
     *
     * @param JobService $jobService
     *
     */
    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return JobResource::collection($this->jobService->getAll());
    }

    public function store(JobRequest $request): JobResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new JobResource($this->jobService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): JobResource
    {
        return JobResource::make($this->jobService->getById($id));
    }

    public function update(JobRequest $request, int $id): JobResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new JobResource($this->jobService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->jobService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
