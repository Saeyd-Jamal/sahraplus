<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Http\Resources\SettingResource;
use App\Services\SettingService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
    /**
     * @var SettingService
     */
    protected SettingService $settingService;

    /**
     * DummyModel Constructor
     *
     * @param SettingService $settingService
     *
     */
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return SettingResource::collection($this->settingService->getAll());
    }

    public function store(SettingRequest $request): SettingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new SettingResource($this->settingService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): SettingResource
    {
        return SettingResource::make($this->settingService->getById($id));
    }

    public function update(SettingRequest $request, int $id): SettingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new SettingResource($this->settingService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->settingService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
