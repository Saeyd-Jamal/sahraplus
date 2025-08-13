<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateRequest;
use App\Http\Resources\StateResource;
use App\Services\StateService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StateController extends Controller
{
    /**
     * @var StateService
     */
    protected StateService $stateService;

    /**
     * DummyModel Constructor
     *
     * @param StateService $stateService
     *
     */
    public function __construct(StateService $stateService)
    {
        $this->stateService = $stateService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return StateResource::collection($this->stateService->getAll());
    }

    public function store(StateRequest $request): StateResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new StateResource($this->stateService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): StateResource
    {
        return StateResource::make($this->stateService->getById($id));
    }

    public function update(StateRequest $request, int $id): StateResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new StateResource($this->stateService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->stateService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
