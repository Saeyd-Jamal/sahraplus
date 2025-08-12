<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use App\Services\SettingsService;

class SettingsController extends Controller
{
    /**
     * @var SettingsService
     */
    protected SettingsService $settingsService;

    /**
     * DummyModel Constructor
     *
     * @param SettingsService $settingsService
     *
     */
    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $settings = $this->settingsService->getAll();
        return view('settings.index', compact('settings'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('settings.create');
    }

    public function store(SettingsRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->settingsService->save($request->validated());
        return redirect()->route('settings.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $settings = $this->settingsService->getById($id);
        return view('settings.show', compact('settings'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $settings = $this->settingsService->getById($id);
        return view('settings.edit', compact('settings'));
    }

    public function update(SettingsRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->settingsService->update($request->validated(), $id);
        return redirect()->route('settings.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->settingsService->deleteById($id);
        return redirect()->route('settings.index')->with('success', 'Deleted successfully');
    }
}
