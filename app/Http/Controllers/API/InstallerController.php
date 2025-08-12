<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstallerRequest;
use App\Http\Resources\InstallerResource;
use App\Services\InstallerService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InstallerController extends Controller
{
    /**
     * @var InstallerService
     */
    protected InstallerService $installerService;

    /**
     * DummyModel Constructor
     *
     * @param InstallerService $installerService
     *
     */
    public function __construct(InstallerService $installerService)
    {
        $this->installerService = $installerService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return InstallerResource::collection($this->installerService->getAll());
    }

    public function store(InstallerRequest $request): InstallerResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new InstallerResource($this->installerService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): InstallerResource
    {
        return InstallerResource::make($this->installerService->getById($id));
    }

    public function update(InstallerRequest $request, int $id): InstallerResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new InstallerResource($this->installerService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->installerService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
