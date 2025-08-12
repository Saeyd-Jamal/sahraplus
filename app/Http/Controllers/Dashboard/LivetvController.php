<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LivetvRequest;
use App\Services\LivetvService;

class LivetvController extends Controller
{
    /**
     * @var LivetvService
     */
    protected LivetvService $livetvService;

    /**
     * DummyModel Constructor
     *
     * @param LivetvService $livetvService
     *
     */
    public function __construct(LivetvService $livetvService)
    {
        $this->livetvService = $livetvService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $livetvs = $this->livetvService->getAll();
        return view('livetvs.index', compact('livetvs'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('livetvs.create');
    }

    public function store(LivetvRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->livetvService->save($request->validated());
        return redirect()->route('livetvs.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $livetv = $this->livetvService->getById($id);
        return view('livetvs.show', compact('livetv'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $livetv = $this->livetvService->getById($id);
        return view('livetvs.edit', compact('livetv'));
    }

    public function update(LivetvRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->livetvService->update($request->validated(), $id);
        return redirect()->route('livetvs.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->livetvService->deleteById($id);
        return redirect()->route('livetvs.index')->with('success', 'Deleted successfully');
    }
}
