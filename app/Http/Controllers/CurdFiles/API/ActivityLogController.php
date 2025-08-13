<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityLogRequest;
use App\Http\Resources\ActivityLogResource;
use App\Services\ActivityLogService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActivityLogController extends Controller
{
    /**
     * @var ActivityLogService
     */
    protected ActivityLogService $activityLogService;

    /**
     * DummyModel Constructor
     *
     * @param ActivityLogService $activityLogService
     *
     */
    public function __construct(ActivityLogService $activityLogService)
    {
        $this->activityLogService = $activityLogService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ActivityLogResource::collection($this->activityLogService->getAll());
    }

    public function store(ActivityLogRequest $request): ActivityLogResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new ActivityLogResource($this->activityLogService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): ActivityLogResource
    {
        return ActivityLogResource::make($this->activityLogService->getById($id));
    }

    public function update(ActivityLogRequest $request, int $id): ActivityLogResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new ActivityLogResource($this->activityLogService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->activityLogService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
