<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SessionRequest;
use App\Http\Resources\SessionResource;
use App\Services\SessionService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SessionController extends Controller
{
    /**
     * @var SessionService
     */
    protected SessionService $sessionService;

    /**
     * DummyModel Constructor
     *
     * @param SessionService $sessionService
     *
     */
    public function __construct(SessionService $sessionService)
    {
        $this->sessionService = $sessionService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return SessionResource::collection($this->sessionService->getAll());
    }

    public function store(SessionRequest $request): SessionResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new SessionResource($this->sessionService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): SessionResource
    {
        return SessionResource::make($this->sessionService->getById($id));
    }

    public function update(SessionRequest $request, int $id): SessionResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new SessionResource($this->sessionService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->sessionService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
