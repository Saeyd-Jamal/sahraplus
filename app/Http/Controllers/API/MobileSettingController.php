<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MobileSettingRequest;
use App\Http\Resources\MobileSettingResource;
use App\Services\MobileSettingService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MobileSettingController extends Controller
{
    /**
     * @var MobileSettingService
     */
    protected MobileSettingService $mobileSettingService;

    /**
     * DummyModel Constructor
     *
     * @param MobileSettingService $mobileSettingService
     *
     */
    public function __construct(MobileSettingService $mobileSettingService)
    {
        $this->mobileSettingService = $mobileSettingService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return MobileSettingResource::collection($this->mobileSettingService->getAll());
    }

    public function store(MobileSettingRequest $request): MobileSettingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new MobileSettingResource($this->mobileSettingService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): MobileSettingResource
    {
        return MobileSettingResource::make($this->mobileSettingService->getById($id));
    }

    public function update(MobileSettingRequest $request, int $id): MobileSettingResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new MobileSettingResource($this->mobileSettingService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->mobileSettingService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
