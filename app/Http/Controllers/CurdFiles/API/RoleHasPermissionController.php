<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleHasPermissionRequest;
use App\Http\Resources\RoleHasPermissionResource;
use App\Services\RoleHasPermissionService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleHasPermissionController extends Controller
{
    /**
     * @var RoleHasPermissionService
     */
    protected RoleHasPermissionService $roleHasPermissionService;

    /**
     * DummyModel Constructor
     *
     * @param RoleHasPermissionService $roleHasPermissionService
     *
     */
    public function __construct(RoleHasPermissionService $roleHasPermissionService)
    {
        $this->roleHasPermissionService = $roleHasPermissionService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return RoleHasPermissionResource::collection($this->roleHasPermissionService->getAll());
    }

    public function store(RoleHasPermissionRequest $request): RoleHasPermissionResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new RoleHasPermissionResource($this->roleHasPermissionService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): RoleHasPermissionResource
    {
        return RoleHasPermissionResource::make($this->roleHasPermissionService->getById($id));
    }

    public function update(RoleHasPermissionRequest $request, int $id): RoleHasPermissionResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new RoleHasPermissionResource($this->roleHasPermissionService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->roleHasPermissionService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
