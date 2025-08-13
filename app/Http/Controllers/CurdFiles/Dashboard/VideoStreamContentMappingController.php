<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoStreamContentMappingRequest;
use App\Services\VideoStreamContentMappingService;

class VideoStreamContentMappingController extends Controller
{
    /**
     * @var VideoStreamContentMappingService
     */
    protected VideoStreamContentMappingService $videoStreamContentMappingService;

    /**
     * DummyModel Constructor
     *
     * @param VideoStreamContentMappingService $videoStreamContentMappingService
     *
     */
    public function __construct(VideoStreamContentMappingService $videoStreamContentMappingService)
    {
        $this->videoStreamContentMappingService = $videoStreamContentMappingService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $video_stream_content_mappings = $this->videoStreamContentMappingService->getAll();
        return view('video_stream_content_mappings.index', compact('video_stream_content_mappings'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('video_stream_content_mappings.create');
    }

    public function store(VideoStreamContentMappingRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->videoStreamContentMappingService->save($request->validated());
        return redirect()->route('video_stream_content_mappings.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $videoStreamContentMapping = $this->videoStreamContentMappingService->getById($id);
        return view('video_stream_content_mappings.show', compact('videoStreamContentMapping'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $videoStreamContentMapping = $this->videoStreamContentMappingService->getById($id);
        return view('video_stream_content_mappings.edit', compact('videoStreamContentMapping'));
    }

    public function update(VideoStreamContentMappingRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->videoStreamContentMappingService->update($request->validated(), $id);
        return redirect()->route('video_stream_content_mappings.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->videoStreamContentMappingService->deleteById($id);
        return redirect()->route('video_stream_content_mappings.index')->with('success', 'Deleted successfully');
    }
}
