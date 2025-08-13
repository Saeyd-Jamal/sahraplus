<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubtitleRequest;
use App\Services\SubtitleService;

class SubtitleController extends Controller
{
    /**
     * @var SubtitleService
     */
    protected SubtitleService $subtitleService;

    /**
     * DummyModel Constructor
     *
     * @param SubtitleService $subtitleService
     *
     */
    public function __construct(SubtitleService $subtitleService)
    {
        $this->subtitleService = $subtitleService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $subtitles = $this->subtitleService->getAll();
        return view('subtitles.index', compact('subtitles'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('subtitles.create');
    }

    public function store(SubtitleRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->subtitleService->save($request->validated());
        return redirect()->route('subtitles.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $subtitle = $this->subtitleService->getById($id);
        return view('subtitles.show', compact('subtitle'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $subtitle = $this->subtitleService->getById($id);
        return view('subtitles.edit', compact('subtitle'));
    }

    public function update(SubtitleRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->subtitleService->update($request->validated(), $id);
        return redirect()->route('subtitles.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->subtitleService->deleteById($id);
        return redirect()->route('subtitles.index')->with('success', 'Deleted successfully');
    }
}
