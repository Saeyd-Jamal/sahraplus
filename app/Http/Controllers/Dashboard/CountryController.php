<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Services\CountryService;

class CountryController extends Controller
{
    /**
     * @var CountryService
     */
    protected CountryService $countryService;

    /**
     * DummyModel Constructor
     *
     * @param CountryService $countryService
     *
     */
    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $countries = $this->countryService->getAll();
        return view('countries.index', compact('countries'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('countries.create');
    }

    public function store(CountryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->countryService->save($request->validated());
        return redirect()->route('countries.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $country = $this->countryService->getById($id);
        return view('countries.show', compact('country'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $country = $this->countryService->getById($id);
        return view('countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->countryService->update($request->validated(), $id);
        return redirect()->route('countries.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->countryService->deleteById($id);
        return redirect()->route('countries.index')->with('success', 'Deleted successfully');
    }
}
