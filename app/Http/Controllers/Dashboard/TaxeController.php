<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaxeRequest;
use App\Services\TaxeService;

class TaxeController extends Controller
{
    /**
     * @var TaxeService
     */
    protected TaxeService $taxeService;

    /**
     * DummyModel Constructor
     *
     * @param TaxeService $taxeService
     *
     */
    public function __construct(TaxeService $taxeService)
    {
        $this->taxeService = $taxeService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $taxes = $this->taxeService->getAll();
        return view('taxes.index', compact('taxes'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('taxes.create');
    }

    public function store(TaxeRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->taxeService->save($request->validated());
        return redirect()->route('taxes.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $taxe = $this->taxeService->getById($id);
        return view('taxes.show', compact('taxe'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $taxe = $this->taxeService->getById($id);
        return view('taxes.edit', compact('taxe'));
    }

    public function update(TaxeRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->taxeService->update($request->validated(), $id);
        return redirect()->route('taxes.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->taxeService->deleteById($id);
        return redirect()->route('taxes.index')->with('success', 'Deleted successfully');
    }
}
