<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeviceRequest;
use App\Services\DeviceService;

class DeviceController extends Controller
{
    /**
     * @var DeviceService
     */
    protected DeviceService $deviceService;

    /**
     * DummyModel Constructor
     *
     * @param DeviceService $deviceService
     *
     */
    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $devices = $this->deviceService->getAll();
        return view('devices.index', compact('devices'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('devices.create');
    }

    public function store(DeviceRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->deviceService->save($request->validated());
        return redirect()->route('devices.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $device = $this->deviceService->getById($id);
        return view('devices.show', compact('device'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $device = $this->deviceService->getById($id);
        return view('devices.edit', compact('device'));
    }

    public function update(DeviceRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->deviceService->update($request->validated(), $id);
        return redirect()->route('devices.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->deviceService->deleteById($id);
        return redirect()->route('devices.index')->with('success', 'Deleted successfully');
    }
}
