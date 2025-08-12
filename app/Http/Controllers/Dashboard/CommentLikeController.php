<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentLikeRequest;
use App\Services\CommentLikeService;

class CommentLikeController extends Controller
{
    /**
     * @var CommentLikeService
     */
    protected CommentLikeService $commentLikeService;

    /**
     * DummyModel Constructor
     *
     * @param CommentLikeService $commentLikeService
     *
     */
    public function __construct(CommentLikeService $commentLikeService)
    {
        $this->commentLikeService = $commentLikeService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $comment_likes = $this->commentLikeService->getAll();
        return view('comment_likes.index', compact('comment_likes'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('comment_likes.create');
    }

    public function store(CommentLikeRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->commentLikeService->save($request->validated());
        return redirect()->route('comment_likes.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $commentLike = $this->commentLikeService->getById($id);
        return view('comment_likes.show', compact('commentLike'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $commentLike = $this->commentLikeService->getById($id);
        return view('comment_likes.edit', compact('commentLike'));
    }

    public function update(CommentLikeRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->commentLikeService->update($request->validated(), $id);
        return redirect()->route('comment_likes.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->commentLikeService->deleteById($id);
        return redirect()->route('comment_likes.index')->with('success', 'Deleted successfully');
    }
}
