<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeSliderRequest;
use App\Services\HomeSliderService;

class HomeSliderController extends Controller
{
    /**
     * @var HomeSliderService
     */
    protected HomeSliderService $homeSliderService;

    /**
     * DummyModel Constructor
     *
     * @param HomeSliderService $homeSliderService
     *
     */
    public function __construct(HomeSliderService $homeSliderService)
    {
        $this->homeSliderService = $homeSliderService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $home_sliders = $this->homeSliderService->getAll();
        return view('home_sliders.index', compact('home_sliders'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('home_sliders.create');
    }

    public function store(HomeSliderRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->homeSliderService->save($request->validated());
        return redirect()->route('home_sliders.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $homeSlider = $this->homeSliderService->getById($id);
        return view('home_sliders.show', compact('homeSlider'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $homeSlider = $this->homeSliderService->getById($id);
        return view('home_sliders.edit', compact('homeSlider'));
    }

    public function update(HomeSliderRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->homeSliderService->update($request->validated(), $id);
        return redirect()->route('home_sliders.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->homeSliderService->deleteById($id);
        return redirect()->route('home_sliders.index')->with('success', 'Deleted successfully');
    }
}
