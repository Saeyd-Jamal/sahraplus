<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntertainmentTalentMappingRequest;
use App\Services\EntertainmentTalentMappingService;

class EntertainmentTalentMappingController extends Controller
{
    /**
     * @var EntertainmentTalentMappingService
     */
    protected EntertainmentTalentMappingService $entertainmentTalentMappingService;

    /**
     * DummyModel Constructor
     *
     * @param EntertainmentTalentMappingService $entertainmentTalentMappingService
     *
     */
    public function __construct(EntertainmentTalentMappingService $entertainmentTalentMappingService)
    {
        $this->entertainmentTalentMappingService = $entertainmentTalentMappingService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $entertainment_talent_mappings = $this->entertainmentTalentMappingService->getAll();
        return view('entertainment_talent_mappings.index', compact('entertainment_talent_mappings'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('entertainment_talent_mappings.create');
    }

    public function store(EntertainmentTalentMappingRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentTalentMappingService->save($request->validated());
        return redirect()->route('entertainment_talent_mappings.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $entertainmentTalentMapping = $this->entertainmentTalentMappingService->getById($id);
        return view('entertainment_talent_mappings.show', compact('entertainmentTalentMapping'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $entertainmentTalentMapping = $this->entertainmentTalentMappingService->getById($id);
        return view('entertainment_talent_mappings.edit', compact('entertainmentTalentMapping'));
    }

    public function update(EntertainmentTalentMappingRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentTalentMappingService->update($request->validated(), $id);
        return redirect()->route('entertainment_talent_mappings.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentTalentMappingService->deleteById($id);
        return redirect()->route('entertainment_talent_mappings.index')->with('success', 'Deleted successfully');
    }
}
