<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelHasRoleRequest;
use App\Http\Resources\ModelHasRoleResource;
use App\Services\ModelHasRoleService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModelHasRoleController extends Controller
{
    /**
     * @var ModelHasRoleService
     */
    protected ModelHasRoleService $modelHasRoleService;

    /**
     * DummyModel Constructor
     *
     * @param ModelHasRoleService $modelHasRoleService
     *
     */
    public function __construct(ModelHasRoleService $modelHasRoleService)
    {
        $this->modelHasRoleService = $modelHasRoleService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ModelHasRoleResource::collection($this->modelHasRoleService->getAll());
    }

    public function store(ModelHasRoleRequest $request): ModelHasRoleResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new ModelHasRoleResource($this->modelHasRoleService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): ModelHasRoleResource
    {
        return ModelHasRoleResource::make($this->modelHasRoleService->getById($id));
    }

    public function update(ModelHasRoleRequest $request, int $id): ModelHasRoleResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new ModelHasRoleResource($this->modelHasRoleService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->modelHasRoleService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
