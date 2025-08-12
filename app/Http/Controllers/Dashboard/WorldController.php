<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorldRequest;
use App\Services\WorldService;

class WorldController extends Controller
{
    /**
     * @var WorldService
     */
    protected WorldService $worldService;

    /**
     * DummyModel Constructor
     *
     * @param WorldService $worldService
     *
     */
    public function __construct(WorldService $worldService)
    {
        $this->worldService = $worldService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $worlds = $this->worldService->getAll();
        return view('worlds.index', compact('worlds'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('worlds.create');
    }

    public function store(WorldRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->worldService->save($request->validated());
        return redirect()->route('worlds.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $world = $this->worldService->getById($id);
        return view('worlds.show', compact('world'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $world = $this->worldService->getById($id);
        return view('worlds.edit', compact('world'));
    }

    public function update(WorldRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->worldService->update($request->validated(), $id);
        return redirect()->route('worlds.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->worldService->deleteById($id);
        return redirect()->route('worlds.index')->with('success', 'Deleted successfully');
    }
}
