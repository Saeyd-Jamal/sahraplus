<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebhookCallRequest;
use App\Http\Resources\WebhookCallResource;
use App\Services\WebhookCallService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebhookCallController extends Controller
{
    /**
     * @var WebhookCallService
     */
    protected WebhookCallService $webhookCallService;

    /**
     * DummyModel Constructor
     *
     * @param WebhookCallService $webhookCallService
     *
     */
    public function __construct(WebhookCallService $webhookCallService)
    {
        $this->webhookCallService = $webhookCallService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return WebhookCallResource::collection($this->webhookCallService->getAll());
    }

    public function store(WebhookCallRequest $request): WebhookCallResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new WebhookCallResource($this->webhookCallService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): WebhookCallResource
    {
        return WebhookCallResource::make($this->webhookCallService->getById($id));
    }

    public function update(WebhookCallRequest $request, int $id): WebhookCallResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new WebhookCallResource($this->webhookCallService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->webhookCallService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
