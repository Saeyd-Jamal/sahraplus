<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LiveTvStreamContentMappingRequest;
use App\Services\LiveTvStreamContentMappingService;

class LiveTvStreamContentMappingController extends Controller
{
    /**
     * @var LiveTvStreamContentMappingService
     */
    protected LiveTvStreamContentMappingService $liveTvStreamContentMappingService;

    /**
     * DummyModel Constructor
     *
     * @param LiveTvStreamContentMappingService $liveTvStreamContentMappingService
     *
     */
    public function __construct(LiveTvStreamContentMappingService $liveTvStreamContentMappingService)
    {
        $this->liveTvStreamContentMappingService = $liveTvStreamContentMappingService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $live_tv_stream_content_mappings = $this->liveTvStreamContentMappingService->getAll();
        return view('live_tv_stream_content_mappings.index', compact('live_tv_stream_content_mappings'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('live_tv_stream_content_mappings.create');
    }

    public function store(LiveTvStreamContentMappingRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->liveTvStreamContentMappingService->save($request->validated());
        return redirect()->route('live_tv_stream_content_mappings.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $liveTvStreamContentMapping = $this->liveTvStreamContentMappingService->getById($id);
        return view('live_tv_stream_content_mappings.show', compact('liveTvStreamContentMapping'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $liveTvStreamContentMapping = $this->liveTvStreamContentMappingService->getById($id);
        return view('live_tv_stream_content_mappings.edit', compact('liveTvStreamContentMapping'));
    }

    public function update(LiveTvStreamContentMappingRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->liveTvStreamContentMappingService->update($request->validated(), $id);
        return redirect()->route('live_tv_stream_content_mappings.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->liveTvStreamContentMappingService->deleteById($id);
        return redirect()->route('live_tv_stream_content_mappings.index')->with('success', 'Deleted successfully');
    }
}
