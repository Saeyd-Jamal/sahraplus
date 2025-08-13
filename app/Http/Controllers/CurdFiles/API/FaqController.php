<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use App\Http\Resources\FaqResource;
use App\Services\FaqService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FaqController extends Controller
{
    /**
     * @var FaqService
     */
    protected FaqService $faqService;

    /**
     * DummyModel Constructor
     *
     * @param FaqService $faqService
     *
     */
    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return FaqResource::collection($this->faqService->getAll());
    }

    public function store(FaqRequest $request): FaqResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new FaqResource($this->faqService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): FaqResource
    {
        return FaqResource::make($this->faqService->getById($id));
    }

    public function update(FaqRequest $request, int $id): FaqResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new FaqResource($this->faqService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->faqService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
