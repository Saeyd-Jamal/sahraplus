<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserWatchHistoryRequest;
use App\Http\Resources\UserWatchHistoryResource;
use App\Services\UserWatchHistoryService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserWatchHistoryController extends Controller
{
    /**
     * @var UserWatchHistoryService
     */
    protected UserWatchHistoryService $userWatchHistoryService;

    /**
     * DummyModel Constructor
     *
     * @param UserWatchHistoryService $userWatchHistoryService
     *
     */
    public function __construct(UserWatchHistoryService $userWatchHistoryService)
    {
        $this->userWatchHistoryService = $userWatchHistoryService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return UserWatchHistoryResource::collection($this->userWatchHistoryService->getAll());
    }

    public function store(UserWatchHistoryRequest $request): UserWatchHistoryResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new UserWatchHistoryResource($this->userWatchHistoryService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): UserWatchHistoryResource
    {
        return UserWatchHistoryResource::make($this->userWatchHistoryService->getById($id));
    }

    public function update(UserWatchHistoryRequest $request, int $id): UserWatchHistoryResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new UserWatchHistoryResource($this->userWatchHistoryService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->userWatchHistoryService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
