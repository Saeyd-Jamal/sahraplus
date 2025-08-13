<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarRequest;
use App\Http\Resources\AvatarResource;
use App\Services\AvatarService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AvatarController extends Controller
{
    /**
     * @var AvatarService
     */
    protected AvatarService $avatarService;

    /**
     * DummyModel Constructor
     *
     * @param AvatarService $avatarService
     *
     */
    public function __construct(AvatarService $avatarService)
    {
        $this->avatarService = $avatarService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return AvatarResource::collection($this->avatarService->getAll());
    }

    public function store(AvatarRequest $request): AvatarResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new AvatarResource($this->avatarService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): AvatarResource
    {
        return AvatarResource::make($this->avatarService->getById($id));
    }

    public function update(AvatarRequest $request, int $id): AvatarResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new AvatarResource($this->avatarService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->avatarService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
