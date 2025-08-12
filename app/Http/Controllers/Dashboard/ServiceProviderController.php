<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceProviderRequest;
use App\Services\ServiceProviderService;

class ServiceProviderController extends Controller
{
    /**
     * @var ServiceProviderService
     */
    protected ServiceProviderService $serviceProviderService;

    /**
     * DummyModel Constructor
     *
     * @param ServiceProviderService $serviceProviderService
     *
     */
    public function __construct(ServiceProviderService $serviceProviderService)
    {
        $this->serviceProviderService = $serviceProviderService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $service_providers = $this->serviceProviderService->getAll();
        return view('service_providers.index', compact('service_providers'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('service_providers.create');
    }

    public function store(ServiceProviderRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->serviceProviderService->save($request->validated());
        return redirect()->route('service_providers.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $serviceProvider = $this->serviceProviderService->getById($id);
        return view('service_providers.show', compact('serviceProvider'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $serviceProvider = $this->serviceProviderService->getById($id);
        return view('service_providers.edit', compact('serviceProvider'));
    }

    public function update(ServiceProviderRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->serviceProviderService->update($request->validated(), $id);
        return redirect()->route('service_providers.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->serviceProviderService->deleteById($id);
        return redirect()->route('service_providers.index')->with('success', 'Deleted successfully');
    }
}
