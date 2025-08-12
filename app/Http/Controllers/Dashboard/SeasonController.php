<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeasonRequest;
use App\Services\SeasonService;

class SeasonController extends Controller
{
    /**
     * @var SeasonService
     */
    protected SeasonService $seasonService;

    /**
     * DummyModel Constructor
     *
     * @param SeasonService $seasonService
     *
     */
    public function __construct(SeasonService $seasonService)
    {
        $this->seasonService = $seasonService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $seasons = $this->seasonService->getAll();
        return view('seasons.index', compact('seasons'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('seasons.create');
    }

    public function store(SeasonRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->seasonService->save($request->validated());
        return redirect()->route('seasons.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $season = $this->seasonService->getById($id);
        return view('seasons.show', compact('season'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $season = $this->seasonService->getById($id);
        return view('seasons.edit', compact('season'));
    }

    public function update(SeasonRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->seasonService->update($request->validated(), $id);
        return redirect()->route('seasons.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->seasonService->deleteById($id);
        return redirect()->route('seasons.index')->with('success', 'Deleted successfully');
    }
}
