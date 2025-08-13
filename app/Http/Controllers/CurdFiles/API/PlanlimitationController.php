<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanlimitationRequest;
use App\Http\Resources\PlanlimitationResource;
use App\Services\PlanlimitationService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanlimitationController extends Controller
{
    /**
     * @var PlanlimitationService
     */
    protected PlanlimitationService $planlimitationService;

    /**
     * DummyModel Constructor
     *
     * @param PlanlimitationService $planlimitationService
     *
     */
    public function __construct(PlanlimitationService $planlimitationService)
    {
        $this->planlimitationService = $planlimitationService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return PlanlimitationResource::collection($this->planlimitationService->getAll());
    }

    public function store(PlanlimitationRequest $request): PlanlimitationResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new PlanlimitationResource($this->planlimitationService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): PlanlimitationResource
    {
        return PlanlimitationResource::make($this->planlimitationService->getById($id));
    }

    public function update(PlanlimitationRequest $request, int $id): PlanlimitationResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new PlanlimitationResource($this->planlimitationService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->planlimitationService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
