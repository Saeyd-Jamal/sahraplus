<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderItemRequest;
use App\Http\Resources\SliderItemResource;
use App\Services\SliderItemService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SliderItemController extends Controller
{
    /**
     * @var SliderItemService
     */
    protected SliderItemService $sliderItemService;

    /**
     * DummyModel Constructor
     *
     * @param SliderItemService $sliderItemService
     *
     */
    public function __construct(SliderItemService $sliderItemService)
    {
        $this->sliderItemService = $sliderItemService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return SliderItemResource::collection($this->sliderItemService->getAll());
    }

    public function store(SliderItemRequest $request): SliderItemResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new SliderItemResource($this->sliderItemService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): SliderItemResource
    {
        return SliderItemResource::make($this->sliderItemService->getById($id));
    }

    public function update(SliderItemRequest $request, int $id): SliderItemResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new SliderItemResource($this->sliderItemService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->sliderItemService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
