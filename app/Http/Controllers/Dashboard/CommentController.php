<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Services\CommentService;

class CommentController extends Controller
{
    /**
     * @var CommentService
     */
    protected CommentService $commentService;

    /**
     * DummyModel Constructor
     *
     * @param CommentService $commentService
     *
     */
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $comments = $this->commentService->getAll();
        return view('comments.index', compact('comments'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('comments.create');
    }

    public function store(CommentRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->commentService->save($request->validated());
        return redirect()->route('comments.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $comment = $this->commentService->getById($id);
        return view('comments.show', compact('comment'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $comment = $this->commentService->getById($id);
        return view('comments.edit', compact('comment'));
    }

    public function update(CommentRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->commentService->update($request->validated(), $id);
        return redirect()->route('comments.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->commentService->deleteById($id);
        return redirect()->route('comments.index')->with('success', 'Deleted successfully');
    }
}
