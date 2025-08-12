<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntertainmentRequest;
use App\Services\EntertainmentService;

class EntertainmentController extends Controller
{
    /**
     * @var EntertainmentService
     */
    protected EntertainmentService $entertainmentService;

    /**
     * DummyModel Constructor
     *
     * @param EntertainmentService $entertainmentService
     *
     */
    public function __construct(EntertainmentService $entertainmentService)
    {
        $this->entertainmentService = $entertainmentService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $entertainments = $this->entertainmentService->getAll();
        return view('entertainments.index', compact('entertainments'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('entertainments.create');
    }

    public function store(EntertainmentRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentService->save($request->validated());
        return redirect()->route('entertainments.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $entertainment = $this->entertainmentService->getById($id);
        return view('entertainments.show', compact('entertainment'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $entertainment = $this->entertainmentService->getById($id);
        return view('entertainments.edit', compact('entertainment'));
    }

    public function update(EntertainmentRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentService->update($request->validated(), $id);
        return redirect()->route('entertainments.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->entertainmentService->deleteById($id);
        return redirect()->route('entertainments.index')->with('success', 'Deleted successfully');
    }
}
