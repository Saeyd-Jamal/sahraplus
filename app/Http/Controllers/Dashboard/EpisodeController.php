<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodeRequest;
use App\Services\EpisodeService;

class EpisodeController extends Controller
{
    /**
     * @var EpisodeService
     */
    protected EpisodeService $episodeService;

    /**
     * DummyModel Constructor
     *
     * @param EpisodeService $episodeService
     *
     */
    public function __construct(EpisodeService $episodeService)
    {
        $this->episodeService = $episodeService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $episodes = $this->episodeService->getAll();
        return view('episodes.index', compact('episodes'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('episodes.create');
    }

    public function store(EpisodeRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->episodeService->save($request->validated());
        return redirect()->route('episodes.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $episode = $this->episodeService->getById($id);
        return view('episodes.show', compact('episode'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $episode = $this->episodeService->getById($id);
        return view('episodes.edit', compact('episode'));
    }

    public function update(EpisodeRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->episodeService->update($request->validated(), $id);
        return redirect()->route('episodes.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->episodeService->deleteById($id);
        return redirect()->route('episodes.index')->with('success', 'Deleted successfully');
    }
}
