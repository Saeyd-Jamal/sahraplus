<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProviderRequest;
use App\Http\Resources\UserProviderResource;
use App\Services\UserProviderService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserProviderController extends Controller
{
    /**
     * @var UserProviderService
     */
    protected UserProviderService $userProviderService;

    /**
     * DummyModel Constructor
     *
     * @param UserProviderService $userProviderService
     *
     */
    public function __construct(UserProviderService $userProviderService)
    {
        $this->userProviderService = $userProviderService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return UserProviderResource::collection($this->userProviderService->getAll());
    }

    public function store(UserProviderRequest $request): UserProviderResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new UserProviderResource($this->userProviderService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): UserProviderResource
    {
        return UserProviderResource::make($this->userProviderService->getById($id));
    }

    public function update(UserProviderRequest $request, int $id): UserProviderResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new UserProviderResource($this->userProviderService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->userProviderService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
