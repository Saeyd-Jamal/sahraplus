<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyRequest;
use App\Services\CurrencyService;

class CurrencyController extends Controller
{
    /**
     * @var CurrencyService
     */
    protected CurrencyService $currencyService;

    /**
     * DummyModel Constructor
     *
     * @param CurrencyService $currencyService
     *
     */
    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $currencies = $this->currencyService->getAll();
        return view('currencies.index', compact('currencies'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('currencies.create');
    }

    public function store(CurrencyRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->currencyService->save($request->validated());
        return redirect()->route('currencies.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $currency = $this->currencyService->getById($id);
        return view('currencies.show', compact('currency'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $currency = $this->currencyService->getById($id);
        return view('currencies.edit', compact('currency'));
    }

    public function update(CurrencyRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->currencyService->update($request->validated(), $id);
        return redirect()->route('currencies.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->currencyService->deleteById($id);
        return redirect()->route('currencies.index')->with('success', 'Deleted successfully');
    }
}
