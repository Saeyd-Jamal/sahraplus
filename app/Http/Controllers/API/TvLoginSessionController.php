<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TvLoginSessionRequest;
use App\Http\Resources\TvLoginSessionResource;
use App\Services\TvLoginSessionService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TvLoginSessionController extends Controller
{
    /**
     * @var TvLoginSessionService
     */
    protected TvLoginSessionService $tvLoginSessionService;

    /**
     * DummyModel Constructor
     *
     * @param TvLoginSessionService $tvLoginSessionService
     *
     */
    public function __construct(TvLoginSessionService $tvLoginSessionService)
    {
        $this->tvLoginSessionService = $tvLoginSessionService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return TvLoginSessionResource::collection($this->tvLoginSessionService->getAll());
    }

    public function store(TvLoginSessionRequest $request): TvLoginSessionResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new TvLoginSessionResource($this->tvLoginSessionService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): TvLoginSessionResource
    {
        return TvLoginSessionResource::make($this->tvLoginSessionService->getById($id));
    }

    public function update(TvLoginSessionRequest $request, int $id): TvLoginSessionResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new TvLoginSessionResource($this->tvLoginSessionService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->tvLoginSessionService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
