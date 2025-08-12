<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CastCrewRequest;
use App\Http\Resources\CastCrewResource;
use App\Services\CastCrewService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CastCrewController extends Controller
{
    /**
     * @var CastCrewService
     */
    protected CastCrewService $castCrewService;

    /**
     * DummyModel Constructor
     *
     * @param CastCrewService $castCrewService
     *
     */
    public function __construct(CastCrewService $castCrewService)
    {
        $this->castCrewService = $castCrewService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return CastCrewResource::collection($this->castCrewService->getAll());
    }

    public function store(CastCrewRequest $request): CastCrewResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new CastCrewResource($this->castCrewService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): CastCrewResource
    {
        return CastCrewResource::make($this->castCrewService->getById($id));
    }

    public function update(CastCrewRequest $request, int $id): CastCrewResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new CastCrewResource($this->castCrewService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->castCrewService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
