<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationTemplateContentMappingRequest;
use App\Http\Resources\NotificationTemplateContentMappingResource;
use App\Services\NotificationTemplateContentMappingService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificationTemplateContentMappingController extends Controller
{
    /**
     * @var NotificationTemplateContentMappingService
     */
    protected NotificationTemplateContentMappingService $notificationTemplateContentMappingService;

    /**
     * DummyModel Constructor
     *
     * @param NotificationTemplateContentMappingService $notificationTemplateContentMappingService
     *
     */
    public function __construct(NotificationTemplateContentMappingService $notificationTemplateContentMappingService)
    {
        $this->notificationTemplateContentMappingService = $notificationTemplateContentMappingService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return NotificationTemplateContentMappingResource::collection($this->notificationTemplateContentMappingService->getAll());
    }

    public function store(NotificationTemplateContentMappingRequest $request): NotificationTemplateContentMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new NotificationTemplateContentMappingResource($this->notificationTemplateContentMappingService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): NotificationTemplateContentMappingResource
    {
        return NotificationTemplateContentMappingResource::make($this->notificationTemplateContentMappingService->getById($id));
    }

    public function update(NotificationTemplateContentMappingRequest $request, int $id): NotificationTemplateContentMappingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new NotificationTemplateContentMappingResource($this->notificationTemplateContentMappingService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->notificationTemplateContentMappingService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
