<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Resources\BannerResource;
use App\Services\BannerService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BannerController extends Controller
{
    /**
     * @var BannerService
     */
    protected BannerService $bannerService;

    /**
     * DummyModel Constructor
     *
     * @param BannerService $bannerService
     *
     */
    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return BannerResource::collection($this->bannerService->getAll());
    }

    public function store(BannerRequest $request): BannerResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new BannerResource($this->bannerService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): BannerResource
    {
        return BannerResource::make($this->bannerService->getById($id));
    }

    public function update(BannerRequest $request, int $id): BannerResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new BannerResource($this->bannerService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->bannerService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
