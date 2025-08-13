<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntertainmentViewRequest;
use App\Services\EntertainmentViewService;

class EntertainmentViewController extends Controller
{
    /**
     * @var EntertainmentViewService
     */
    protected EntertainmentViewService $entertainmentViewService;

    /**
     * DummyModel Constructor
     *
     * @param EntertainmentViewService $entertainmentViewService
     *
     */
    public function __construct(EntertainmentViewService $entertainmentViewService)
    {
        $this->entertainmentViewService = $entertainmentViewService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $entertainment_views = $this->entertainmentViewService->getAll();
        return view('entertainment_views.index', compact('entertainment_views'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('entertainment_views.create');
    }

    public function store(EntertainmentViewRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentViewService->save($request->validated());
        return redirect()->route('entertainment_views.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $entertainmentView = $this->entertainmentViewService->getById($id);
        return view('entertainment_views.show', compact('entertainmentView'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $entertainmentView = $this->entertainmentViewService->getById($id);
        return view('entertainment_views.edit', compact('entertainmentView'));
    }

    public function update(EntertainmentViewRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentViewService->update($request->validated(), $id);
        return redirect()->route('entertainment_views.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentViewService->deleteById($id);
        return redirect()->route('entertainment_views.index')->with('success', 'Deleted successfully');
    }
}
