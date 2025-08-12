<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShortRequest;
use App\Services\ShortService;

class ShortController extends Controller
{
    /**
     * @var ShortService
     */
    protected ShortService $shortService;

    /**
     * DummyModel Constructor
     *
     * @param ShortService $shortService
     *
     */
    public function __construct(ShortService $shortService)
    {
        $this->shortService = $shortService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $shorts = $this->shortService->getAll();
        return view('shorts.index', compact('shorts'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('shorts.create');
    }

    public function store(ShortRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->shortService->save($request->validated());
        return redirect()->route('shorts.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $short = $this->shortService->getById($id);
        return view('shorts.show', compact('short'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $short = $this->shortService->getById($id);
        return view('shorts.edit', compact('short'));
    }

    public function update(ShortRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->shortService->update($request->validated(), $id);
        return redirect()->route('shorts.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->shortService->deleteById($id);
        return redirect()->route('shorts.index')->with('success', 'Deleted successfully');
    }
}
