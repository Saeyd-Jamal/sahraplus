<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LikeRequest;
use App\Services\LikeService;

class LikeController extends Controller
{
    /**
     * @var LikeService
     */
    protected LikeService $likeService;

    /**
     * DummyModel Constructor
     *
     * @param LikeService $likeService
     *
     */
    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $likes = $this->likeService->getAll();
        return view('likes.index', compact('likes'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('likes.create');
    }

    public function store(LikeRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->likeService->save($request->validated());
        return redirect()->route('likes.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $like = $this->likeService->getById($id);
        return view('likes.show', compact('like'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $like = $this->likeService->getById($id);
        return view('likes.edit', compact('like'));
    }

    public function update(LikeRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->likeService->update($request->validated(), $id);
        return redirect()->route('likes.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->likeService->deleteById($id);
        return redirect()->route('likes.index')->with('success', 'Deleted successfully');
    }
}
