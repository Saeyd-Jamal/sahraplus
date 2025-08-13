<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Services\LanguageService;

class LanguageController extends Controller
{
    /**
     * @var LanguageService
     */
    protected LanguageService $languageService;

    /**
     * DummyModel Constructor
     *
     * @param LanguageService $languageService
     *
     */
    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $languages = $this->languageService->getAll();
        return view('languages.index', compact('languages'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('languages.create');
    }

    public function store(LanguageRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->languageService->save($request->validated());
        return redirect()->route('languages.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $language = $this->languageService->getById($id);
        return view('languages.show', compact('language'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $language = $this->languageService->getById($id);
        return view('languages.edit', compact('language'));
    }

    public function update(LanguageRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->languageService->update($request->validated(), $id);
        return redirect()->route('languages.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->languageService->deleteById($id);
        return redirect()->route('languages.index')->with('success', 'Deleted successfully');
    }
}
