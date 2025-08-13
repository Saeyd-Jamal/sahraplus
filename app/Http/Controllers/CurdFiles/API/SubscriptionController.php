<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\SubscriptionResource;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionController extends Controller
{
    /**
     * @var SubscriptionService
     */
    protected SubscriptionService $subscriptionService;

    /**
     * DummyModel Constructor
     *
     * @param SubscriptionService $subscriptionService
     *
     */
    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return SubscriptionResource::collection($this->subscriptionService->getAll());
    }

    public function store(SubscriptionRequest $request): SubscriptionResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new SubscriptionResource($this->subscriptionService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): SubscriptionResource
    {
        return SubscriptionResource::make($this->subscriptionService->getById($id));
    }

    public function update(SubscriptionRequest $request, int $id): SubscriptionResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new SubscriptionResource($this->subscriptionService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->subscriptionService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
