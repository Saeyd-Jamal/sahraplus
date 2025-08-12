<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Http\Resources\CouponResource;
use App\Services\CouponService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CouponController extends Controller
{
    /**
     * @var CouponService
     */
    protected CouponService $couponService;

    /**
     * DummyModel Constructor
     *
     * @param CouponService $couponService
     *
     */
    public function __construct(CouponService $couponService)
    {
        $this->couponService = $couponService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return CouponResource::collection($this->couponService->getAll());
    }

    public function store(CouponRequest $request): CouponResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new CouponResource($this->couponService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): CouponResource
    {
        return CouponResource::make($this->couponService->getById($id));
    }

    public function update(CouponRequest $request, int $id): CouponResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new CouponResource($this->couponService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->couponService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
