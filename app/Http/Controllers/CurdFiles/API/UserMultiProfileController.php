<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserMultiProfileRequest;
use App\Http\Resources\UserMultiProfileResource;
use App\Services\UserMultiProfileService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMultiProfileController extends Controller
{
    /**
     * @var UserMultiProfileService
     */
    protected UserMultiProfileService $userMultiProfileService;

    /**
     * DummyModel Constructor
     *
     * @param UserMultiProfileService $userMultiProfileService
     *
     */
    public function __construct(UserMultiProfileService $userMultiProfileService)
    {
        $this->userMultiProfileService = $userMultiProfileService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return UserMultiProfileResource::collection($this->userMultiProfileService->getAll());
    }

    public function store(UserMultiProfileRequest $request): UserMultiProfileResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new UserMultiProfileResource($this->userMultiProfileService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): UserMultiProfileResource
    {
        return UserMultiProfileResource::make($this->userMultiProfileService->getById($id));
    }

    public function update(UserMultiProfileRequest $request, int $id): UserMultiProfileResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new UserMultiProfileResource($this->userMultiProfileService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->userMultiProfileService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
