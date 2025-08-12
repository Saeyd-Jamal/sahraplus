<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Services\VideoService;

class VideoController extends Controller
{
    /**
     * @var VideoService
     */
    protected VideoService $videoService;

    /**
     * DummyModel Constructor
     *
     * @param VideoService $videoService
     *
     */
    public function __construct(VideoService $videoService)
    {
        $this->videoService = $videoService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $videos = $this->videoService->getAll();
        return view('videos.index', compact('videos'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('videos.create');
    }

    public function store(VideoRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->videoService->save($request->validated());
        return redirect()->route('videos.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $video = $this->videoService->getById($id);
        return view('videos.show', compact('video'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $video = $this->videoService->getById($id);
        return view('videos.edit', compact('video'));
    }

    public function update(VideoRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->videoService->update($request->validated(), $id);
        return redirect()->route('videos.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->videoService->deleteById($id);
        return redirect()->route('videos.index')->with('success', 'Deleted successfully');
    }
}
