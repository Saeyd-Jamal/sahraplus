<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Services\PageService;

class PageController extends Controller
{
    /**
     * @var PageService
     */
    protected PageService $pageService;

    /**
     * DummyModel Constructor
     *
     * @param PageService $pageService
     *
     */
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $pages = $this->pageService->getAll();
        return view('pages.index', compact('pages'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('pages.create');
    }

    public function store(PageRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->pageService->save($request->validated());
        return redirect()->route('pages.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $page = $this->pageService->getById($id);
        return view('pages.show', compact('page'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $page = $this->pageService->getById($id);
        return view('pages.edit', compact('page'));
    }

    public function update(PageRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->pageService->update($request->validated(), $id);
        return redirect()->route('pages.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->pageService->deleteById($id);
        return redirect()->route('pages.index')->with('success', 'Deleted successfully');
    }
}
