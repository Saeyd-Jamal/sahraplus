<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use App\Http\Resources\SettingsResource;
use App\Services\SettingsService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends Controller
{
    /**
     * @var SettingsService
     */
    protected SettingsService $settingsService;

    /**
     * DummyModel Constructor
     *
     * @param SettingsService $settingsService
     *
     */
    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return SettingsResource::collection($this->settingsService->getAll());
    }

    public function store(SettingsRequest $request): SettingsResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new SettingsResource($this->settingsService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): SettingsResource
    {
        return SettingsResource::make($this->settingsService->getById($id));
    }

    public function update(SettingsRequest $request, int $id): SettingsResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new SettingsResource($this->settingsService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->settingsService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
