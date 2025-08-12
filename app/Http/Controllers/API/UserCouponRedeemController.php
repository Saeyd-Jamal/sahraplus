<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCouponRedeemRequest;
use App\Http\Resources\UserCouponRedeemResource;
use App\Services\UserCouponRedeemService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserCouponRedeemController extends Controller
{
    /**
     * @var UserCouponRedeemService
     */
    protected UserCouponRedeemService $userCouponRedeemService;

    /**
     * DummyModel Constructor
     *
     * @param UserCouponRedeemService $userCouponRedeemService
     *
     */
    public function __construct(UserCouponRedeemService $userCouponRedeemService)
    {
        $this->userCouponRedeemService = $userCouponRedeemService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return UserCouponRedeemResource::collection($this->userCouponRedeemService->getAll());
    }

    public function store(UserCouponRedeemRequest $request): UserCouponRedeemResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new UserCouponRedeemResource($this->userCouponRedeemService->save($request->validated()));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id): UserCouponRedeemResource
    {
        return UserCouponRedeemResource::make($this->userCouponRedeemService->getById($id));
    }

    public function update(UserCouponRedeemRequest $request, int $id): UserCouponRedeemResource|\Illuminate\Http\JsonResponse
    {
        try {
            return new UserCouponRedeemResource($this->userCouponRedeemService->update($request->validated(), $id));
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->userCouponRedeemService->deleteById($id);
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
