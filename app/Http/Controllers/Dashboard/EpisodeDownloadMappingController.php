<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodeDownloadMappingRequest;
use App\Services\EpisodeDownloadMappingService;

class EpisodeDownloadMappingController extends Controller
{
    /**
     * @var EpisodeDownloadMappingService
     */
    protected EpisodeDownloadMappingService $episodeDownloadMappingService;

    /**
     * DummyModel Constructor
     *
     * @param EpisodeDownloadMappingService $episodeDownloadMappingService
     *
     */
    public function __construct(EpisodeDownloadMappingService $episodeDownloadMappingService)
    {
        $this->episodeDownloadMappingService = $episodeDownloadMappingService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $episode_download_mappings = $this->episodeDownloadMappingService->getAll();
        return view('episode_download_mappings.index', compact('episode_download_mappings'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('episode_download_mappings.create');
    }

    public function store(EpisodeDownloadMappingRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->episodeDownloadMappingService->save($request->validated());
        return redirect()->route('episode_download_mappings.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $episodeDownloadMapping = $this->episodeDownloadMappingService->getById($id);
        return view('episode_download_mappings.show', compact('episodeDownloadMapping'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $episodeDownloadMapping = $this->episodeDownloadMappingService->getById($id);
        return view('episode_download_mappings.edit', compact('episodeDownloadMapping'));
    }

    public function update(EpisodeDownloadMappingRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->episodeDownloadMappingService->update($request->validated(), $id);
        return redirect()->route('episode_download_mappings.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->episodeDownloadMappingService->deleteById($id);
        return redirect()->route('episode_download_mappings.index')->with('success', 'Deleted successfully');
    }
}
