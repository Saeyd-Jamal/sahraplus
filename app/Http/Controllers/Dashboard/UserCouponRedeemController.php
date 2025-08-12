<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCouponRedeemRequest;
use App\Services\UserCouponRedeemService;

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

    public function index(): \Illuminate\Contracts\View\View
    {
        $user_coupon_redeems = $this->userCouponRedeemService->getAll();
        return view('user_coupon_redeems.index', compact('user_coupon_redeems'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('user_coupon_redeems.create');
    }

    public function store(UserCouponRedeemRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->userCouponRedeemService->save($request->validated());
        return redirect()->route('user_coupon_redeems.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $userCouponRedeem = $this->userCouponRedeemService->getById($id);
        return view('user_coupon_redeems.show', compact('userCouponRedeem'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $userCouponRedeem = $this->userCouponRedeemService->getById($id);
        return view('user_coupon_redeems.edit', compact('userCouponRedeem'));
    }

    public function update(UserCouponRedeemRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userCouponRedeemService->update($request->validated(), $id);
        return redirect()->route('user_coupon_redeems.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userCouponRedeemService->deleteById($id);
        return redirect()->route('user_coupon_redeems.index')->with('success', 'Deleted successfully');
    }
}
