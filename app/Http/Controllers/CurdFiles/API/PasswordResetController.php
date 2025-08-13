<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Resources\PasswordResetResource;
use App\Services\PasswordResetService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PasswordResetController extends Controller
{
    /**
     * @var PasswordResetService
     */
    protected PasswordResetService $passwordResetService;

    /**
     * DummyModel Constructor
     *
     * @param PasswordResetService $passwordResetService
     *
     */
    public function __construct(PasswordResetService $passwordResetService)
    {
        $this->passwordResetService = $passwordResetService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return PasswordResetResource::collection($this->passwordResetService->getAll());
    }

    public function store(PasswordResetRequest $request): PasswordResetResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new PasswordResetResource($this->passwordResetService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): PasswordResetResource
    {
        return PasswordResetResource::make($this->passwordResetService->getById($id));
    }

    public function update(PasswordResetRequest $request, int $id): PasswordResetResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new PasswordResetResource($this->passwordResetService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->passwordResetService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
