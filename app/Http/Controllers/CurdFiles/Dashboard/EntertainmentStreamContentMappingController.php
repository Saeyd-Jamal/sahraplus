<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntertainmentStreamContentMappingRequest;
use App\Services\EntertainmentStreamContentMappingService;

class EntertainmentStreamContentMappingController extends Controller
{
    /**
     * @var EntertainmentStreamContentMappingService
     */
    protected EntertainmentStreamContentMappingService $entertainmentStreamContentMappingService;

    /**
     * DummyModel Constructor
     *
     * @param EntertainmentStreamContentMappingService $entertainmentStreamContentMappingService
     *
     */
    public function __construct(EntertainmentStreamContentMappingService $entertainmentStreamContentMappingService)
    {
        $this->entertainmentStreamContentMappingService = $entertainmentStreamContentMappingService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $entertainment_stream_content_mappings = $this->entertainmentStreamContentMappingService->getAll();
        return view('entertainment_stream_content_mappings.index', compact('entertainment_stream_content_mappings'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('entertainment_stream_content_mappings.create');
    }

    public function store(EntertainmentStreamContentMappingRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentStreamContentMappingService->save($request->validated());
        return redirect()->route('entertainment_stream_content_mappings.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $entertainmentStreamContentMapping = $this->entertainmentStreamContentMappingService->getById($id);
        return view('entertainment_stream_content_mappings.show', compact('entertainmentStreamContentMapping'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $entertainmentStreamContentMapping = $this->entertainmentStreamContentMappingService->getById($id);
        return view('entertainment_stream_content_mappings.edit', compact('entertainmentStreamContentMapping'));
    }

    public function update(EntertainmentStreamContentMappingRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentStreamContentMappingService->update($request->validated(), $id);
        return redirect()->route('entertainment_stream_content_mappings.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentStreamContentMappingService->deleteById($id);
        return redirect()->route('entertainment_stream_content_mappings.index')->with('success', 'Deleted successfully');
    }
}
