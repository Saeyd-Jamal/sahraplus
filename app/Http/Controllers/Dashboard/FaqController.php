<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use App\Services\FaqService;

class FaqController extends Controller
{
    /**
     * @var FaqService
     */
    protected FaqService $faqService;

    /**
     * DummyModel Constructor
     *
     * @param FaqService $faqService
     *
     */
    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $faqs = $this->faqService->getAll();
        return view('faqs.index', compact('faqs'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('faqs.create');
    }

    public function store(FaqRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->faqService->save($request->validated());
        return redirect()->route('faqs.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $faq = $this->faqService->getById($id);
        return view('faqs.show', compact('faq'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $faq = $this->faqService->getById($id);
        return view('faqs.edit', compact('faq'));
    }

    public function update(FaqRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->faqService->update($request->validated(), $id);
        return redirect()->route('faqs.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->faqService->deleteById($id);
        return redirect()->route('faqs.index')->with('success', 'Deleted successfully');
    }
}
