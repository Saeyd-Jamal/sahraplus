<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileRequest;
use App\Http\Resources\UserProfileResource;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserProfileController extends Controller
{
    /**
     * @var UserProfileService
     */
    protected UserProfileService $userProfileService;

    /**
     * DummyModel Constructor
     *
     * @param UserProfileService $userProfileService
     *
     */
    public function __construct(UserProfileService $userProfileService)
    {
        $this->userProfileService = $userProfileService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return UserProfileResource::collection($this->userProfileService->getAll());
    }

    public function store(UserProfileRequest $request): UserProfileResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new UserProfileResource($this->userProfileService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): UserProfileResource
    {
        return UserProfileResource::make($this->userProfileService->getById($id));
    }

    public function update(UserProfileRequest $request, int $id): UserProfileResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new UserProfileResource($this->userProfileService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->userProfileService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
