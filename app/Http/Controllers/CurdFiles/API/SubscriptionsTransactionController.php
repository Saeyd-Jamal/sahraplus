<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionsTransactionRequest;
use App\Http\Resources\SubscriptionsTransactionResource;
use App\Services\SubscriptionsTransactionService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionsTransactionController extends Controller
{
    /**
     * @var SubscriptionsTransactionService
     */
    protected SubscriptionsTransactionService $subscriptionsTransactionService;

    /**
     * DummyModel Constructor
     *
     * @param SubscriptionsTransactionService $subscriptionsTransactionService
     *
     */
    public function __construct(SubscriptionsTransactionService $subscriptionsTransactionService)
    {
        $this->subscriptionsTransactionService = $subscriptionsTransactionService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return SubscriptionsTransactionResource::collection($this->subscriptionsTransactionService->getAll());
    }

    public function store(SubscriptionsTransactionRequest $request): SubscriptionsTransactionResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new SubscriptionsTransactionResource($this->subscriptionsTransactionService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): SubscriptionsTransactionResource
    {
        return SubscriptionsTransactionResource::make($this->subscriptionsTransactionService->getById($id));
    }

    public function update(SubscriptionsTransactionRequest $request, int $id): SubscriptionsTransactionResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new SubscriptionsTransactionResource($this->subscriptionsTransactionService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->subscriptionsTransactionService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
