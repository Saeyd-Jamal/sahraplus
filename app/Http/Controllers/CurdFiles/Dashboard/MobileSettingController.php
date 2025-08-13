<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MobileSettingRequest;
use App\Services\MobileSettingService;

class MobileSettingController extends Controller
{
    /**
     * @var MobileSettingService
     */
    protected MobileSettingService $mobileSettingService;

    /**
     * DummyModel Constructor
     *
     * @param MobileSettingService $mobileSettingService
     *
     */
    public function __construct(MobileSettingService $mobileSettingService)
    {
        $this->mobileSettingService = $mobileSettingService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $mobile_settings = $this->mobileSettingService->getAll();
        return view('mobile_settings.index', compact('mobile_settings'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('mobile_settings.create');
    }

    public function store(MobileSettingRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->mobileSettingService->save($request->validated());
        return redirect()->route('mobile_settings.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $mobileSetting = $this->mobileSettingService->getById($id);
        return view('mobile_settings.show', compact('mobileSetting'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $mobileSetting = $this->mobileSettingService->getById($id);
        return view('mobile_settings.edit', compact('mobileSetting'));
    }

    public function update(MobileSettingRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->mobileSettingService->update($request->validated(), $id);
        return redirect()->route('mobile_settings.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->mobileSettingService->deleteById($id);
        return redirect()->route('mobile_settings.index')->with('success', 'Deleted successfully');
    }
}
