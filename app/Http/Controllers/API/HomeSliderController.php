<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeSliderRequest;
use App\Http\Resources\HomeSliderResource;
use App\Services\HomeSliderService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeSliderController extends Controller
{
    /**
     * @var HomeSliderService
     */
    protected HomeSliderService $homeSliderService;

    /**
     * DummyModel Constructor
     *
     * @param HomeSliderService $homeSliderService
     *
     */
    public function __construct(HomeSliderService $homeSliderService)
    {
        $this->homeSliderService = $homeSliderService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return HomeSliderResource::collection($this->homeSliderService->getAll());
    }

    public function store(HomeSliderRequest $request): HomeSliderResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new HomeSliderResource($this->homeSliderService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): HomeSliderResource
    {
        return HomeSliderResource::make($this->homeSliderService->getById($id));
    }

    public function update(HomeSliderRequest $request, int $id): HomeSliderResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new HomeSliderResource($this->homeSliderService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->homeSliderService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
