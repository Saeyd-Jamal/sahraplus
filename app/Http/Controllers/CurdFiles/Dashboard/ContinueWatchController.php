<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContinueWatchRequest;
use App\Services\ContinueWatchService;

class ContinueWatchController extends Controller
{
    /**
     * @var ContinueWatchService
     */
    protected ContinueWatchService $continueWatchService;

    /**
     * DummyModel Constructor
     *
     * @param ContinueWatchService $continueWatchService
     *
     */
    public function __construct(ContinueWatchService $continueWatchService)
    {
        $this->continueWatchService = $continueWatchService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $continue_watches = $this->continueWatchService->getAll();
        return view('continue_watches.index', compact('continue_watches'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('continue_watches.create');
    }

    public function store(ContinueWatchRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->continueWatchService->save($request->validated());
        return redirect()->route('continue_watches.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $continueWatch = $this->continueWatchService->getById($id);
        return view('continue_watches.show', compact('continueWatch'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $continueWatch = $this->continueWatchService->getById($id);
        return view('continue_watches.edit', compact('continueWatch'));
    }

    public function update(ContinueWatchRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->continueWatchService->update($request->validated(), $id);
        return redirect()->route('continue_watches.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->continueWatchService->deleteById($id);
        return redirect()->route('continue_watches.index')->with('success', 'Deleted successfully');
    }
}
