<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntertainmentDownloadRequest;
use App\Http\Resources\EntertainmentDownloadResource;
use App\Services\EntertainmentDownloadService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EntertainmentDownloadController extends Controller
{
    /**
     * @var EntertainmentDownloadService
     */
    protected EntertainmentDownloadService $entertainmentDownloadService;

    /**
     * DummyModel Constructor
     *
     * @param EntertainmentDownloadService $entertainmentDownloadService
     *
     */
    public function __construct(EntertainmentDownloadService $entertainmentDownloadService)
    {
        $this->entertainmentDownloadService = $entertainmentDownloadService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return EntertainmentDownloadResource::collection($this->entertainmentDownloadService->getAll());
    }

    public function store(EntertainmentDownloadRequest $request): EntertainmentDownloadResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EntertainmentDownloadResource($this->entertainmentDownloadService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): EntertainmentDownloadResource
    {
        return EntertainmentDownloadResource::make($this->entertainmentDownloadService->getById($id));
    }

    public function update(EntertainmentDownloadRequest $request, int $id): EntertainmentDownloadResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new EntertainmentDownloadResource($this->entertainmentDownloadService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->entertainmentDownloadService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
