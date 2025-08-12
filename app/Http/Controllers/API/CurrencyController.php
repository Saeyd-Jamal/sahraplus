<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyRequest;
use App\Http\Resources\CurrencyResource;
use App\Services\CurrencyService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CurrencyController extends Controller
{
    /**
     * @var CurrencyService
     */
    protected CurrencyService $currencyService;

    /**
     * DummyModel Constructor
     *
     * @param CurrencyService $currencyService
     *
     */
    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return CurrencyResource::collection($this->currencyService->getAll());
    }

    public function store(CurrencyRequest $request): CurrencyResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new CurrencyResource($this->currencyService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): CurrencyResource
    {
        return CurrencyResource::make($this->currencyService->getById($id));
    }

    public function update(CurrencyRequest $request, int $id): CurrencyResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new CurrencyResource($this->currencyService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->currencyService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
