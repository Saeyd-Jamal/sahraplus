<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    /**
     * @var ReviewService
     */
    protected ReviewService $reviewService;

    /**
     * DummyModel Constructor
     *
     * @param ReviewService $reviewService
     *
     */
    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $reviews = $this->reviewService->getAll();
        return view('reviews.index', compact('reviews'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('reviews.create');
    }

    public function store(ReviewRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->reviewService->save($request->validated());
        return redirect()->route('reviews.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $review = $this->reviewService->getById($id);
        return view('reviews.show', compact('review'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $review = $this->reviewService->getById($id);
        return view('reviews.edit', compact('review'));
    }

    public function update(ReviewRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->reviewService->update($request->validated(), $id);
        return redirect()->route('reviews.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->reviewService->deleteById($id);
        return redirect()->route('reviews.index')->with('success', 'Deleted successfully');
    }
}
