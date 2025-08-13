<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;
use App\Services\GenreService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GenreController extends Controller
{
    /**
     * @var GenreService
     */
    protected GenreService $genreService;

    /**
     * DummyModel Constructor
     *
     * @param GenreService $genreService
     *
     */
    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return GenreResource::collection($this->genreService->getAll());
    }

    public function store(GenreRequest $request): GenreResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new GenreResource($this->genreService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): GenreResource
    {
        return GenreResource::make($this->genreService->getById($id));
    }

    public function update(GenreRequest $request, int $id): GenreResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new GenreResource($this->genreService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->genreService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
