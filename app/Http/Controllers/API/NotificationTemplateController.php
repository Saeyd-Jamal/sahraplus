<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationTemplateRequest;
use App\Http\Resources\NotificationTemplateResource;
use App\Services\NotificationTemplateService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificationTemplateController extends Controller
{
    /**
     * @var NotificationTemplateService
     */
    protected NotificationTemplateService $notificationTemplateService;

    /**
     * DummyModel Constructor
     *
     * @param NotificationTemplateService $notificationTemplateService
     *
     */
    public function __construct(NotificationTemplateService $notificationTemplateService)
    {
        $this->notificationTemplateService = $notificationTemplateService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return NotificationTemplateResource::collection($this->notificationTemplateService->getAll());
    }

    public function store(NotificationTemplateRequest $request): NotificationTemplateResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new NotificationTemplateResource($this->notificationTemplateService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): NotificationTemplateResource
    {
        return NotificationTemplateResource::make($this->notificationTemplateService->getById($id));
    }

    public function update(NotificationTemplateRequest $request, int $id): NotificationTemplateResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new NotificationTemplateResource($this->notificationTemplateService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->notificationTemplateService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
