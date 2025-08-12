<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSearchHistoryRequest;
use App\Http\Resources\UserSearchHistoryResource;
use App\Services\UserSearchHistoryService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserSearchHistoryController extends Controller
{
    /**
     * @var UserSearchHistoryService
     */
    protected UserSearchHistoryService $userSearchHistoryService;

    /**
     * DummyModel Constructor
     *
     * @param UserSearchHistoryService $userSearchHistoryService
     *
     */
    public function __construct(UserSearchHistoryService $userSearchHistoryService)
    {
        $this->userSearchHistoryService = $userSearchHistoryService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return UserSearchHistoryResource::collection($this->userSearchHistoryService->getAll());
    }

    public function store(UserSearchHistoryRequest $request): UserSearchHistoryResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new UserSearchHistoryResource($this->userSearchHistoryService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): UserSearchHistoryResource
    {
        return UserSearchHistoryResource::make($this->userSearchHistoryService->getById($id));
    }

    public function update(UserSearchHistoryRequest $request, int $id): UserSearchHistoryResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new UserSearchHistoryResource($this->userSearchHistoryService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->userSearchHistoryService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
