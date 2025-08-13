<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodeStreamContentMappingRequest;
use App\Services\EpisodeStreamContentMappingService;

class EpisodeStreamContentMappingController extends Controller
{
    /**
     * @var EpisodeStreamContentMappingService
     */
    protected EpisodeStreamContentMappingService $episodeStreamContentMappingService;

    /**
     * DummyModel Constructor
     *
     * @param EpisodeStreamContentMappingService $episodeStreamContentMappingService
     *
     */
    public function __construct(EpisodeStreamContentMappingService $episodeStreamContentMappingService)
    {
        $this->episodeStreamContentMappingService = $episodeStreamContentMappingService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $episode_stream_content_mappings = $this->episodeStreamContentMappingService->getAll();
        return view('episode_stream_content_mappings.index', compact('episode_stream_content_mappings'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('episode_stream_content_mappings.create');
    }

    public function store(EpisodeStreamContentMappingRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->episodeStreamContentMappingService->save($request->validated());
        return redirect()->route('episode_stream_content_mappings.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $episodeStreamContentMapping = $this->episodeStreamContentMappingService->getById($id);
        return view('episode_stream_content_mappings.show', compact('episodeStreamContentMapping'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $episodeStreamContentMapping = $this->episodeStreamContentMappingService->getById($id);
        return view('episode_stream_content_mappings.edit', compact('episodeStreamContentMapping'));
    }

    public function update(EpisodeStreamContentMappingRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->episodeStreamContentMappingService->update($request->validated(), $id);
        return redirect()->route('episode_stream_content_mappings.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->episodeStreamContentMappingService->deleteById($id);
        return redirect()->route('episode_stream_content_mappings.index')->with('success', 'Deleted successfully');
    }
}
