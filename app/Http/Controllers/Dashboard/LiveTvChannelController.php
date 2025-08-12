<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LiveTvChannelRequest;
use App\Services\LiveTvChannelService;

class LiveTvChannelController extends Controller
{
    /**
     * @var LiveTvChannelService
     */
    protected LiveTvChannelService $liveTvChannelService;

    /**
     * DummyModel Constructor
     *
     * @param LiveTvChannelService $liveTvChannelService
     *
     */
    public function __construct(LiveTvChannelService $liveTvChannelService)
    {
        $this->liveTvChannelService = $liveTvChannelService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $live_tv_channels = $this->liveTvChannelService->getAll();
        return view('live_tv_channels.index', compact('live_tv_channels'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('live_tv_channels.create');
    }

    public function store(LiveTvChannelRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->liveTvChannelService->save($request->validated());
        return redirect()->route('live_tv_channels.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $liveTvChannel = $this->liveTvChannelService->getById($id);
        return view('live_tv_channels.show', compact('liveTvChannel'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $liveTvChannel = $this->liveTvChannelService->getById($id);
        return view('live_tv_channels.edit', compact('liveTvChannel'));
    }

    public function update(LiveTvChannelRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->liveTvChannelService->update($request->validated(), $id);
        return redirect()->route('live_tv_channels.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->liveTvChannelService->deleteById($id);
        return redirect()->route('live_tv_channels.index')->with('success', 'Deleted successfully');
    }
}
