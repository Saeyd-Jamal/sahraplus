<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\WatchlistRequest;
use App\Services\WatchlistService;

class WatchlistController extends Controller
{
    /**
     * @var WatchlistService
     */
    protected WatchlistService $watchlistService;

    /**
     * DummyModel Constructor
     *
     * @param WatchlistService $watchlistService
     *
     */
    public function __construct(WatchlistService $watchlistService)
    {
        $this->watchlistService = $watchlistService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $watchlists = $this->watchlistService->getAll();
        return view('watchlists.index', compact('watchlists'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('watchlists.create');
    }

    public function store(WatchlistRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->watchlistService->save($request->validated());
        return redirect()->route('watchlists.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $watchlist = $this->watchlistService->getById($id);
        return view('watchlists.show', compact('watchlist'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $watchlist = $this->watchlistService->getById($id);
        return view('watchlists.edit', compact('watchlist'));
    }

    public function update(WatchlistRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->watchlistService->update($request->validated(), $id);
        return redirect()->route('watchlists.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->watchlistService->deleteById($id);
        return redirect()->route('watchlists.index')->with('success', 'Deleted successfully');
    }
}
