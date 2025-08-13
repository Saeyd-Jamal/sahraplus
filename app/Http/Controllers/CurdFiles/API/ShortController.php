<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShortRequest;
use App\Http\Resources\ShortResource;
use App\Services\ShortService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShortController extends Controller
{
    /**
     * @var ShortService
     */
    protected ShortService $shortService;

    /**
     * DummyModel Constructor
     *
     * @param ShortService $shortService
     *
     */
    public function __construct(ShortService $shortService)
    {
        $this->shortService = $shortService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ShortResource::collection($this->shortService->getAll());
    }

    public function store(ShortRequest $request): ShortResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new ShortResource($this->shortService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): ShortResource
    {
        return ShortResource::make($this->shortService->getById($id));
    }

    public function update(ShortRequest $request, int $id): ShortResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new ShortResource($this->shortService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->shortService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
