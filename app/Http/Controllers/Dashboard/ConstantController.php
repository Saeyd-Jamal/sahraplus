<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConstantRequest;
use App\Services\ConstantService;

class ConstantController extends Controller
{
    /**
     * @var ConstantService
     */
    protected ConstantService $constantService;

    /**
     * DummyModel Constructor
     *
     * @param ConstantService $constantService
     *
     */
    public function __construct(ConstantService $constantService)
    {
        $this->constantService = $constantService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $constants = $this->constantService->getAll();
        return view('constants.index', compact('constants'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('constants.create');
    }

    public function store(ConstantRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->constantService->save($request->validated());
        return redirect()->route('constants.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $constant = $this->constantService->getById($id);
        return view('constants.show', compact('constant'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $constant = $this->constantService->getById($id);
        return view('constants.edit', compact('constant'));
    }

    public function update(ConstantRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->constantService->update($request->validated(), $id);
        return redirect()->route('constants.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->constantService->deleteById($id);
        return redirect()->route('constants.index')->with('success', 'Deleted successfully');
    }
}
