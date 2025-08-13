<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntertainmentDownloadRequest;
use App\Services\EntertainmentDownloadService;

class EntertainmentDownloadController extends Controller
{
    /**
     * @var EntertainmentDownloadService
     */
    protected EntertainmentDownloadService $entertainmentDownloadService;

    /**
     * DummyModel Constructor
     *
     * @param EntertainmentDownloadService $entertainmentDownloadService
     *
     */
    public function __construct(EntertainmentDownloadService $entertainmentDownloadService)
    {
        $this->entertainmentDownloadService = $entertainmentDownloadService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $entertainment_downloads = $this->entertainmentDownloadService->getAll();
        return view('entertainment_downloads.index', compact('entertainment_downloads'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('entertainment_downloads.create');
    }

    public function store(EntertainmentDownloadRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentDownloadService->save($request->validated());
        return redirect()->route('entertainment_downloads.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $entertainmentDownload = $this->entertainmentDownloadService->getById($id);
        return view('entertainment_downloads.show', compact('entertainmentDownload'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $entertainmentDownload = $this->entertainmentDownloadService->getById($id);
        return view('entertainment_downloads.edit', compact('entertainmentDownload'));
    }

    public function update(EntertainmentDownloadRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentDownloadService->update($request->validated(), $id);
        return redirect()->route('entertainment_downloads.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentDownloadService->deleteById($id);
        return redirect()->route('entertainment_downloads.index')->with('success', 'Deleted successfully');
    }
}
