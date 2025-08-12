<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserReminderRequest;
use App\Http\Resources\UserReminderResource;
use App\Services\UserReminderService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserReminderController extends Controller
{
    /**
     * @var UserReminderService
     */
    protected UserReminderService $userReminderService;

    /**
     * DummyModel Constructor
     *
     * @param UserReminderService $userReminderService
     *
     */
    public function __construct(UserReminderService $userReminderService)
    {
        $this->userReminderService = $userReminderService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return UserReminderResource::collection($this->userReminderService->getAll());
    }

    public function store(UserReminderRequest $request): UserReminderResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new UserReminderResource($this->userReminderService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): UserReminderResource
    {
        return UserReminderResource::make($this->userReminderService->getById($id));
    }

    public function update(UserReminderRequest $request, int $id): UserReminderResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new UserReminderResource($this->userReminderService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->userReminderService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
