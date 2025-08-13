<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonalAccessTokenRequest;
use App\Http\Resources\PersonalAccessTokenResource;
use App\Services\PersonalAccessTokenService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PersonalAccessTokenController extends Controller
{
    /**
     * @var PersonalAccessTokenService
     */
    protected PersonalAccessTokenService $personalAccessTokenService;

    /**
     * DummyModel Constructor
     *
     * @param PersonalAccessTokenService $personalAccessTokenService
     *
     */
    public function __construct(PersonalAccessTokenService $personalAccessTokenService)
    {
        $this->personalAccessTokenService = $personalAccessTokenService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return PersonalAccessTokenResource::collection($this->personalAccessTokenService->getAll());
    }

    public function store(PersonalAccessTokenRequest $request): PersonalAccessTokenResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new PersonalAccessTokenResource($this->personalAccessTokenService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): PersonalAccessTokenResource
    {
        return PersonalAccessTokenResource::make($this->personalAccessTokenService->getById($id));
    }

    public function update(PersonalAccessTokenRequest $request, int $id): PersonalAccessTokenResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new PersonalAccessTokenResource($this->personalAccessTokenService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->personalAccessTokenService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
