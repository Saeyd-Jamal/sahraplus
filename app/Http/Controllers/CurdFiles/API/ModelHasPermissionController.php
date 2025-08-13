<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelHasPermissionRequest;
use App\Http\Resources\ModelHasPermissionResource;
use App\Services\ModelHasPermissionService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModelHasPermissionController extends Controller
{
    /**
     * @var ModelHasPermissionService
     */
    protected ModelHasPermissionService $modelHasPermissionService;

    /**
     * DummyModel Constructor
     *
     * @param ModelHasPermissionService $modelHasPermissionService
     *
     */
    public function __construct(ModelHasPermissionService $modelHasPermissionService)
    {
        $this->modelHasPermissionService = $modelHasPermissionService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ModelHasPermissionResource::collection($this->modelHasPermissionService->getAll());
    }

    public function store(ModelHasPermissionRequest $request): ModelHasPermissionResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new ModelHasPermissionResource($this->modelHasPermissionService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): ModelHasPermissionResource
    {
        return ModelHasPermissionResource::make($this->modelHasPermissionService->getById($id));
    }

    public function update(ModelHasPermissionRequest $request, int $id): ModelHasPermissionResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new ModelHasPermissionResource($this->modelHasPermissionService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->modelHasPermissionService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
