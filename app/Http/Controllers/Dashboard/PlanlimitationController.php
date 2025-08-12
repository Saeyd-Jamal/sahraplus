<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanlimitationRequest;
use App\Services\PlanlimitationService;

class PlanlimitationController extends Controller
{
    /**
     * @var PlanlimitationService
     */
    protected PlanlimitationService $planlimitationService;

    /**
     * DummyModel Constructor
     *
     * @param PlanlimitationService $planlimitationService
     *
     */
    public function __construct(PlanlimitationService $planlimitationService)
    {
        $this->planlimitationService = $planlimitationService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $planlimitations = $this->planlimitationService->getAll();
        return view('planlimitations.index', compact('planlimitations'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('planlimitations.create');
    }

    public function store(PlanlimitationRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->planlimitationService->save($request->validated());
        return redirect()->route('planlimitations.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $planlimitation = $this->planlimitationService->getById($id);
        return view('planlimitations.show', compact('planlimitation'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $planlimitation = $this->planlimitationService->getById($id);
        return view('planlimitations.edit', compact('planlimitation'));
    }

    public function update(PlanlimitationRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->planlimitationService->update($request->validated(), $id);
        return redirect()->route('planlimitations.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->planlimitationService->deleteById($id);
        return redirect()->route('planlimitations.index')->with('success', 'Deleted successfully');
    }
}
