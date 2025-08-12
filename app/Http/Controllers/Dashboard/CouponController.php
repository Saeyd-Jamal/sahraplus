<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Services\CouponService;

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

    public function index(): \Illuminate\Contracts\View\View
    {
        $coupons = $this->couponService->getAll();
        return view('coupons.index', compact('coupons'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('coupons.create');
    }

    public function store(CouponRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->couponService->save($request->validated());
        return redirect()->route('coupons.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $coupon = $this->couponService->getById($id);
        return view('coupons.show', compact('coupon'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $coupon = $this->couponService->getById($id);
        return view('coupons.edit', compact('coupon'));
    }

    public function update(CouponRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->couponService->update($request->validated(), $id);
        return redirect()->route('coupons.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->couponService->deleteById($id);
        return redirect()->route('coupons.index')->with('success', 'Deleted successfully');
    }
}
