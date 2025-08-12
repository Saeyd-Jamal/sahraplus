<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LiveTvCategoryRequest;
use App\Services\LiveTvCategoryService;

class LiveTvCategoryController extends Controller
{
    /**
     * @var LiveTvCategoryService
     */
    protected LiveTvCategoryService $liveTvCategoryService;

    /**
     * DummyModel Constructor
     *
     * @param LiveTvCategoryService $liveTvCategoryService
     *
     */
    public function __construct(LiveTvCategoryService $liveTvCategoryService)
    {
        $this->liveTvCategoryService = $liveTvCategoryService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $live_tv_categories = $this->liveTvCategoryService->getAll();
        return view('live_tv_categories.index', compact('live_tv_categories'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('live_tv_categories.create');
    }

    public function store(LiveTvCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->liveTvCategoryService->save($request->validated());
        return redirect()->route('live_tv_categories.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $liveTvCategory = $this->liveTvCategoryService->getById($id);
        return view('live_tv_categories.show', compact('liveTvCategory'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $liveTvCategory = $this->liveTvCategoryService->getById($id);
        return view('live_tv_categories.edit', compact('liveTvCategory'));
    }

    public function update(LiveTvCategoryRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->liveTvCategoryService->update($request->validated(), $id);
        return redirect()->route('live_tv_categories.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->liveTvCategoryService->deleteById($id);
        return redirect()->route('live_tv_categories.index')->with('success', 'Deleted successfully');
    }
}
