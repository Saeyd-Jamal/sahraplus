<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Http\Resources\LanguageResource;
use App\Services\LanguageService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageController extends Controller
{
    /**
     * @var LanguageService
     */
    protected LanguageService $languageService;

    /**
     * DummyModel Constructor
     *
     * @param LanguageService $languageService
     *
     */
    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return LanguageResource::collection($this->languageService->getAll());
    }

    public function store(LanguageRequest $request): LanguageResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new LanguageResource($this->languageService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): LanguageResource
    {
        return LanguageResource::make($this->languageService->getById($id));
    }

    public function update(LanguageRequest $request, int $id): LanguageResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new LanguageResource($this->languageService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->languageService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
