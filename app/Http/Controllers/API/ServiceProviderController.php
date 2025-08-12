<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceProviderRequest;
use App\Http\Resources\ServiceProviderResource;
use App\Services\ServiceProviderService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServiceProviderController extends Controller
{
    /**
     * @var ServiceProviderService
     */
    protected ServiceProviderService $serviceProviderService;

    /**
     * DummyModel Constructor
     *
     * @param ServiceProviderService $serviceProviderService
     *
     */
    public function __construct(ServiceProviderService $serviceProviderService)
    {
        $this->serviceProviderService = $serviceProviderService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ServiceProviderResource::collection($this->serviceProviderService->getAll());
    }

    public function store(ServiceProviderRequest $request): ServiceProviderResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new ServiceProviderResource($this->serviceProviderService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): ServiceProviderResource
    {
        return ServiceProviderResource::make($this->serviceProviderService->getById($id));
    }

    public function update(ServiceProviderRequest $request, int $id): ServiceProviderResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new ServiceProviderResource($this->serviceProviderService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->serviceProviderService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
