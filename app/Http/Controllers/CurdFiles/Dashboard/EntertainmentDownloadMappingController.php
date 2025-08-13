<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntertainmentDownloadMappingRequest;
use App\Services\EntertainmentDownloadMappingService;

class EntertainmentDownloadMappingController extends Controller
{
    /**
     * @var EntertainmentDownloadMappingService
     */
    protected EntertainmentDownloadMappingService $entertainmentDownloadMappingService;

    /**
     * DummyModel Constructor
     *
     * @param EntertainmentDownloadMappingService $entertainmentDownloadMappingService
     *
     */
    public function __construct(EntertainmentDownloadMappingService $entertainmentDownloadMappingService)
    {
        $this->entertainmentDownloadMappingService = $entertainmentDownloadMappingService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $entertainment_download_mappings = $this->entertainmentDownloadMappingService->getAll();
        return view('entertainment_download_mappings.index', compact('entertainment_download_mappings'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('entertainment_download_mappings.create');
    }

    public function store(EntertainmentDownloadMappingRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentDownloadMappingService->save($request->validated());
        return redirect()->route('entertainment_download_mappings.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $entertainmentDownloadMapping = $this->entertainmentDownloadMappingService->getById($id);
        return view('entertainment_download_mappings.show', compact('entertainmentDownloadMapping'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $entertainmentDownloadMapping = $this->entertainmentDownloadMappingService->getById($id);
        return view('entertainment_download_mappings.edit', compact('entertainmentDownloadMapping'));
    }

    public function update(EntertainmentDownloadMappingRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentDownloadMappingService->update($request->validated(), $id);
        return redirect()->route('entertainment_download_mappings.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentDownloadMappingService->deleteById($id);
        return redirect()->route('entertainment_download_mappings.index')->with('success', 'Deleted successfully');
    }
}
