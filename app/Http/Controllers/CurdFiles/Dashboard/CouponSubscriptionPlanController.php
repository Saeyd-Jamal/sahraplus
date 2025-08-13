<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponSubscriptionPlanRequest;
use App\Services\CouponSubscriptionPlanService;

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

    public function index(): \Illuminate\Contracts\View\View
    {
        $coupon_subscription_plans = $this->couponSubscriptionPlanService->getAll();
        return view('coupon_subscription_plans.index', compact('coupon_subscription_plans'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('coupon_subscription_plans.create');
    }

    public function store(CouponSubscriptionPlanRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->couponSubscriptionPlanService->save($request->validated());
        return redirect()->route('coupon_subscription_plans.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $couponSubscriptionPlan = $this->couponSubscriptionPlanService->getById($id);
        return view('coupon_subscription_plans.show', compact('couponSubscriptionPlan'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $couponSubscriptionPlan = $this->couponSubscriptionPlanService->getById($id);
        return view('coupon_subscription_plans.edit', compact('couponSubscriptionPlan'));
    }

    public function update(CouponSubscriptionPlanRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->couponSubscriptionPlanService->update($request->validated(), $id);
        return redirect()->route('coupon_subscription_plans.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->couponSubscriptionPlanService->deleteById($id);
        return redirect()->route('coupon_subscription_plans.index')->with('success', 'Deleted successfully');
    }
}
