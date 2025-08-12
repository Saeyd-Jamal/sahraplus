<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConstantRequest;
use App\Http\Resources\ConstantResource;
use App\Services\ConstantService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConstantController extends Controller
{
    /**
     * @var ConstantService
     */
    protected ConstantService $constantService;

    /**
     * DummyModel Constructor
     *
     * @param ConstantService $constantService
     *
     */
    public function __construct(ConstantService $constantService)
    {
        $this->constantService = $constantService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ConstantResource::collection($this->constantService->getAll());
    }

    public function store(ConstantRequest $request): ConstantResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new ConstantResource($this->constantService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): ConstantResource
    {
        return ConstantResource::make($this->constantService->getById($id));
    }

    public function update(ConstantRequest $request, int $id): ConstantResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new ConstantResource($this->constantService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->constantService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
