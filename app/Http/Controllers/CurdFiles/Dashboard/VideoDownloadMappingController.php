<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoDownloadMappingRequest;
use App\Services\VideoDownloadMappingService;

class VideoDownloadMappingController extends Controller
{
    /**
     * @var VideoDownloadMappingService
     */
    protected VideoDownloadMappingService $videoDownloadMappingService;

    /**
     * DummyModel Constructor
     *
     * @param VideoDownloadMappingService $videoDownloadMappingService
     *
     */
    public function __construct(VideoDownloadMappingService $videoDownloadMappingService)
    {
        $this->videoDownloadMappingService = $videoDownloadMappingService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $video_download_mappings = $this->videoDownloadMappingService->getAll();
        return view('video_download_mappings.index', compact('video_download_mappings'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('video_download_mappings.create');
    }

    public function store(VideoDownloadMappingRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->videoDownloadMappingService->save($request->validated());
        return redirect()->route('video_download_mappings.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $videoDownloadMapping = $this->videoDownloadMappingService->getById($id);
        return view('video_download_mappings.show', compact('videoDownloadMapping'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $videoDownloadMapping = $this->videoDownloadMappingService->getById($id);
        return view('video_download_mappings.edit', compact('videoDownloadMapping'));
    }

    public function update(VideoDownloadMappingRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->videoDownloadMappingService->update($request->validated(), $id);
        return redirect()->route('video_download_mappings.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->videoDownloadMappingService->deleteById($id);
        return redirect()->route('video_download_mappings.index')->with('success', 'Deleted successfully');
    }
}
