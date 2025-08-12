<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Services\CityService;

class CityController extends Controller
{
    /**
     * @var CityService
     */
    protected CityService $cityService;

    /**
     * DummyModel Constructor
     *
     * @param CityService $cityService
     *
     */
    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $cities = $this->cityService->getAll();
        return view('cities.index', compact('cities'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('cities.create');
    }

    public function store(CityRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->cityService->save($request->validated());
        return redirect()->route('cities.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $city = $this->cityService->getById($id);
        return view('cities.show', compact('city'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $city = $this->cityService->getById($id);
        return view('cities.edit', compact('city'));
    }

    public function update(CityRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->cityService->update($request->validated(), $id);
        return redirect()->route('cities.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->cityService->deleteById($id);
        return redirect()->route('cities.index')->with('success', 'Deleted successfully');
    }
}
