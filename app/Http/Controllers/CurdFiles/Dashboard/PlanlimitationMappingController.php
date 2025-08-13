<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanlimitationMappingRequest;
use App\Services\PlanlimitationMappingService;

class PlanlimitationMappingController extends Controller
{
    /**
     * @var PlanlimitationMappingService
     */
    protected PlanlimitationMappingService $planlimitationMappingService;

    /**
     * DummyModel Constructor
     *
     * @param PlanlimitationMappingService $planlimitationMappingService
     *
     */
    public function __construct(PlanlimitationMappingService $planlimitationMappingService)
    {
        $this->planlimitationMappingService = $planlimitationMappingService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $planlimitation_mappings = $this->planlimitationMappingService->getAll();
        return view('planlimitation_mappings.index', compact('planlimitation_mappings'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('planlimitation_mappings.create');
    }

    public function store(PlanlimitationMappingRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->planlimitationMappingService->save($request->validated());
        return redirect()->route('planlimitation_mappings.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $planlimitationMapping = $this->planlimitationMappingService->getById($id);
        return view('planlimitation_mappings.show', compact('planlimitationMapping'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $planlimitationMapping = $this->planlimitationMappingService->getById($id);
        return view('planlimitation_mappings.edit', compact('planlimitationMapping'));
    }

    public function update(PlanlimitationMappingRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->planlimitationMappingService->update($request->validated(), $id);
        return redirect()->route('planlimitation_mappings.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->planlimitationMappingService->deleteById($id);
        return redirect()->route('planlimitation_mappings.index')->with('success', 'Deleted successfully');
    }
}
