<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntertainmentGenerMappingRequest;
use App\Services\EntertainmentGenerMappingService;

class EntertainmentGenerMappingController extends Controller
{
    /**
     * @var EntertainmentGenerMappingService
     */
    protected EntertainmentGenerMappingService $entertainmentGenerMappingService;

    /**
     * DummyModel Constructor
     *
     * @param EntertainmentGenerMappingService $entertainmentGenerMappingService
     *
     */
    public function __construct(EntertainmentGenerMappingService $entertainmentGenerMappingService)
    {
        $this->entertainmentGenerMappingService = $entertainmentGenerMappingService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $entertainment_gener_mappings = $this->entertainmentGenerMappingService->getAll();
        return view('entertainment_gener_mappings.index', compact('entertainment_gener_mappings'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('entertainment_gener_mappings.create');
    }

    public function store(EntertainmentGenerMappingRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentGenerMappingService->save($request->validated());
        return redirect()->route('entertainment_gener_mappings.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $entertainmentGenerMapping = $this->entertainmentGenerMappingService->getById($id);
        return view('entertainment_gener_mappings.show', compact('entertainmentGenerMapping'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $entertainmentGenerMapping = $this->entertainmentGenerMappingService->getById($id);
        return view('entertainment_gener_mappings.edit', compact('entertainmentGenerMapping'));
    }

    public function update(EntertainmentGenerMappingRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentGenerMappingService->update($request->validated(), $id);
        return redirect()->route('entertainment_gener_mappings.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentGenerMappingService->deleteById($id);
        return redirect()->route('entertainment_gener_mappings.index')->with('success', 'Deleted successfully');
    }
}
