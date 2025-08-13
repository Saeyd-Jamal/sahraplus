<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\WatchHistoryRequest;
use App\Services\WatchHistoryService;

class WatchHistoryController extends Controller
{
    /**
     * @var WatchHistoryService
     */
    protected WatchHistoryService $watchHistoryService;

    /**
     * DummyModel Constructor
     *
     * @param WatchHistoryService $watchHistoryService
     *
     */
    public function __construct(WatchHistoryService $watchHistoryService)
    {
        $this->watchHistoryService = $watchHistoryService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $watch_histories = $this->watchHistoryService->getAll();
        return view('watch_histories.index', compact('watch_histories'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('watch_histories.create');
    }

    public function store(WatchHistoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->watchHistoryService->save($request->validated());
        return redirect()->route('watch_histories.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $watchHistory = $this->watchHistoryService->getById($id);
        return view('watch_histories.show', compact('watchHistory'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $watchHistory = $this->watchHistoryService->getById($id);
        return view('watch_histories.edit', compact('watchHistory'));
    }

    public function update(WatchHistoryRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->watchHistoryService->update($request->validated(), $id);
        return redirect()->route('watch_histories.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->watchHistoryService->deleteById($id);
        return redirect()->route('watch_histories.index')->with('success', 'Deleted successfully');
    }
}
