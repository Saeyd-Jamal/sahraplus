<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeviceRequest;
use App\Http\Resources\DeviceResource;
use App\Services\DeviceService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeviceController extends Controller
{
    /**
     * @var DeviceService
     */
    protected DeviceService $deviceService;

    /**
     * DummyModel Constructor
     *
     * @param DeviceService $deviceService
     *
     */
    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return DeviceResource::collection($this->deviceService->getAll());
    }

    public function store(DeviceRequest $request): DeviceResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new DeviceResource($this->deviceService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): DeviceResource
    {
        return DeviceResource::make($this->deviceService->getById($id));
    }

    public function update(DeviceRequest $request, int $id): DeviceResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new DeviceResource($this->deviceService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->deviceService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
