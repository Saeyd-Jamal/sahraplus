<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Http\Resources\PageResource;
use App\Services\PageService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    /**
     * @var PageService
     */
    protected PageService $pageService;

    /**
     * DummyModel Constructor
     *
     * @param PageService $pageService
     *
     */
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return PageResource::collection($this->pageService->getAll());
    }

    public function store(PageRequest $request): PageResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new PageResource($this->pageService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): PageResource
    {
        return PageResource::make($this->pageService->getById($id));
    }

    public function update(PageRequest $request, int $id): PageResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new PageResource($this->pageService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->pageService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
