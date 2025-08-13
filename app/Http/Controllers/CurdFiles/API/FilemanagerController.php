<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilemanagerRequest;
use App\Http\Resources\FilemanagerResource;
use App\Services\FilemanagerService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilemanagerController extends Controller
{
    /**
     * @var FilemanagerService
     */
    protected FilemanagerService $filemanagerService;

    /**
     * DummyModel Constructor
     *
     * @param FilemanagerService $filemanagerService
     *
     */
    public function __construct(FilemanagerService $filemanagerService)
    {
        $this->filemanagerService = $filemanagerService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return FilemanagerResource::collection($this->filemanagerService->getAll());
    }

    public function store(FilemanagerRequest $request): FilemanagerResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new FilemanagerResource($this->filemanagerService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): FilemanagerResource
    {
        return FilemanagerResource::make($this->filemanagerService->getById($id));
    }

    public function update(FilemanagerRequest $request, int $id): FilemanagerResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new FilemanagerResource($this->filemanagerService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->filemanagerService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
