<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntertainmentCountryMappingRequest;
use App\Services\EntertainmentCountryMappingService;

class EntertainmentCountryMappingController extends Controller
{
    /**
     * @var EntertainmentCountryMappingService
     */
    protected EntertainmentCountryMappingService $entertainmentCountryMappingService;

    /**
     * DummyModel Constructor
     *
     * @param EntertainmentCountryMappingService $entertainmentCountryMappingService
     *
     */
    public function __construct(EntertainmentCountryMappingService $entertainmentCountryMappingService)
    {
        $this->entertainmentCountryMappingService = $entertainmentCountryMappingService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $entertainment_country_mappings = $this->entertainmentCountryMappingService->getAll();
        return view('entertainment_country_mappings.index', compact('entertainment_country_mappings'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('entertainment_country_mappings.create');
    }

    public function store(EntertainmentCountryMappingRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentCountryMappingService->save($request->validated());
        return redirect()->route('entertainment_country_mappings.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $entertainmentCountryMapping = $this->entertainmentCountryMappingService->getById($id);
        return view('entertainment_country_mappings.show', compact('entertainmentCountryMapping'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $entertainmentCountryMapping = $this->entertainmentCountryMappingService->getById($id);
        return view('entertainment_country_mappings.edit', compact('entertainmentCountryMapping'));
    }

    public function update(EntertainmentCountryMappingRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentCountryMappingService->update($request->validated(), $id);
        return redirect()->route('entertainment_country_mappings.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentCountryMappingService->deleteById($id);
        return redirect()->route('entertainment_country_mappings.index')->with('success', 'Deleted successfully');
    }
}
