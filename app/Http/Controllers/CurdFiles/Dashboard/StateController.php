<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateRequest;
use App\Services\StateService;

class StateController extends Controller
{
    /**
     * @var StateService
     */
    protected StateService $stateService;

    /**
     * DummyModel Constructor
     *
     * @param StateService $stateService
     *
     */
    public function __construct(StateService $stateService)
    {
        $this->stateService = $stateService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $states = $this->stateService->getAll();
        return view('states.index', compact('states'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('states.create');
    }

    public function store(StateRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->stateService->save($request->validated());
        return redirect()->route('states.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $state = $this->stateService->getById($id);
        return view('states.show', compact('state'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $state = $this->stateService->getById($id);
        return view('states.edit', compact('state'));
    }

    public function update(StateRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->stateService->update($request->validated(), $id);
        return redirect()->route('states.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->stateService->deleteById($id);
        return redirect()->route('states.index')->with('success', 'Deleted successfully');
    }
}
