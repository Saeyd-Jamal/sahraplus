<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    /**
     * @var RoleService
     */
    protected RoleService $roleService;

    /**
     * DummyModel Constructor
     *
     * @param RoleService $roleService
     *
     */
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return RoleResource::collection($this->roleService->getAll());
    }

    public function store(RoleRequest $request): RoleResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new RoleResource($this->roleService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): RoleResource
    {
        return RoleResource::make($this->roleService->getById($id));
    }

    public function update(RoleRequest $request, int $id): RoleResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new RoleResource($this->roleService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->roleService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
