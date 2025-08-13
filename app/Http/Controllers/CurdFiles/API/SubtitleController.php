<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubtitleRequest;
use App\Http\Resources\SubtitleResource;
use App\Services\SubtitleService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubtitleController extends Controller
{
    /**
     * @var SubtitleService
     */
    protected SubtitleService $subtitleService;

    /**
     * DummyModel Constructor
     *
     * @param SubtitleService $subtitleService
     *
     */
    public function __construct(SubtitleService $subtitleService)
    {
        $this->subtitleService = $subtitleService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return SubtitleResource::collection($this->subtitleService->getAll());
    }

    public function store(SubtitleRequest $request): SubtitleResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new SubtitleResource($this->subtitleService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): SubtitleResource
    {
        return SubtitleResource::make($this->subtitleService->getById($id));
    }

    public function update(SubtitleRequest $request, int $id): SubtitleResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new SubtitleResource($this->subtitleService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->subtitleService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
