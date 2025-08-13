<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    /**
     * @var PermissionService
     */
    protected PermissionService $permissionService;

    /**
     * DummyModel Constructor
     *
     * @param PermissionService $permissionService
     *
     */
    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return PermissionResource::collection($this->permissionService->getAll());
    }

    public function store(PermissionRequest $request): PermissionResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new PermissionResource($this->permissionService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): PermissionResource
    {
        return PermissionResource::make($this->permissionService->getById($id));
    }

    public function update(PermissionRequest $request, int $id): PermissionResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new PermissionResource($this->permissionService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->permissionService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
