<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponSubscriptionPlanRequest;
use App\Http\Resources\CouponSubscriptionPlanResource;
use App\Services\CouponSubscriptionPlanService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CouponSubscriptionPlanController extends Controller
{
    /**
     * @var CouponSubscriptionPlanService
     */
    protected CouponSubscriptionPlanService $couponSubscriptionPlanService;

    /**
     * DummyModel Constructor
     *
     * @param CouponSubscriptionPlanService $couponSubscriptionPlanService
     *
     */
    public function __construct(CouponSubscriptionPlanService $couponSubscriptionPlanService)
    {
        $this->couponSubscriptionPlanService = $couponSubscriptionPlanService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return CouponSubscriptionPlanResource::collection($this->couponSubscriptionPlanService->getAll());
    }

    public function store(CouponSubscriptionPlanRequest $request): CouponSubscriptionPlanResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new CouponSubscriptionPlanResource($this->couponSubscriptionPlanService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): CouponSubscriptionPlanResource
    {
        return CouponSubscriptionPlanResource::make($this->couponSubscriptionPlanService->getById($id));
    }

    public function update(CouponSubscriptionPlanRequest $request, int $id): CouponSubscriptionPlanResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new CouponSubscriptionPlanResource($this->couponSubscriptionPlanService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->couponSubscriptionPlanService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
