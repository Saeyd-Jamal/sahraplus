<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaxeRequest;
use App\Http\Resources\TaxeResource;
use App\Services\TaxeService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaxeController extends Controller
{
    /**
     * @var TaxeService
     */
    protected TaxeService $taxeService;

    /**
     * DummyModel Constructor
     *
     * @param TaxeService $taxeService
     *
     */
    public function __construct(TaxeService $taxeService)
    {
        $this->taxeService = $taxeService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return TaxeResource::collection($this->taxeService->getAll());
    }

    public function store(TaxeRequest $request): TaxeResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new TaxeResource($this->taxeService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): TaxeResource
    {
        return TaxeResource::make($this->taxeService->getById($id));
    }

    public function update(TaxeRequest $request, int $id): TaxeResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new TaxeResource($this->taxeService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->taxeService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
