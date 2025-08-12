<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Services\SettingService;

class SettingController extends Controller
{
    /**
     * @var SettingService
     */
    protected SettingService $settingService;

    /**
     * DummyModel Constructor
     *
     * @param SettingService $settingService
     *
     */
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $settings = $this->settingService->getAll();
        return view('settings.index', compact('settings'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('settings.create');
    }

    public function store(SettingRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->settingService->save($request->validated());
        return redirect()->route('settings.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $setting = $this->settingService->getById($id);
        return view('settings.show', compact('setting'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $setting = $this->settingService->getById($id);
        return view('settings.edit', compact('setting'));
    }

    public function update(SettingRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->settingService->update($request->validated(), $id);
        return redirect()->route('settings.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->settingService->deleteById($id);
        return redirect()->route('settings.index')->with('success', 'Deleted successfully');
    }
}
