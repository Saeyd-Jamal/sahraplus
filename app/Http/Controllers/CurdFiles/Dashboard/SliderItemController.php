<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderItemRequest;
use App\Services\SliderItemService;

class SliderItemController extends Controller
{
    /**
     * @var SliderItemService
     */
    protected SliderItemService $sliderItemService;

    /**
     * DummyModel Constructor
     *
     * @param SliderItemService $sliderItemService
     *
     */
    public function __construct(SliderItemService $sliderItemService)
    {
        $this->sliderItemService = $sliderItemService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $slider_items = $this->sliderItemService->getAll();
        return view('slider_items.index', compact('slider_items'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('slider_items.create');
    }

    public function store(SliderItemRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->sliderItemService->save($request->validated());
        return redirect()->route('slider_items.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $sliderItem = $this->sliderItemService->getById($id);
        return view('slider_items.show', compact('sliderItem'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $sliderItem = $this->sliderItemService->getById($id);
        return view('slider_items.edit', compact('sliderItem'));
    }

    public function update(SliderItemRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->sliderItemService->update($request->validated(), $id);
        return redirect()->route('slider_items.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->sliderItemService->deleteById($id);
        return redirect()->route('slider_items.index')->with('success', 'Deleted successfully');
    }
}
