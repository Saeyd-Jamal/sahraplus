<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserWatchHistoryRequest;
use App\Services\UserWatchHistoryService;

class UserWatchHistoryController extends Controller
{
    /**
     * @var UserWatchHistoryService
     */
    protected UserWatchHistoryService $userWatchHistoryService;

    /**
     * DummyModel Constructor
     *
     * @param UserWatchHistoryService $userWatchHistoryService
     *
     */
    public function __construct(UserWatchHistoryService $userWatchHistoryService)
    {
        $this->userWatchHistoryService = $userWatchHistoryService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $user_watch_histories = $this->userWatchHistoryService->getAll();
        return view('user_watch_histories.index', compact('user_watch_histories'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('user_watch_histories.create');
    }

    public function store(UserWatchHistoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->userWatchHistoryService->save($request->validated());
        return redirect()->route('user_watch_histories.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $userWatchHistory = $this->userWatchHistoryService->getById($id);
        return view('user_watch_histories.show', compact('userWatchHistory'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $userWatchHistory = $this->userWatchHistoryService->getById($id);
        return view('user_watch_histories.edit', compact('userWatchHistory'));
    }

    public function update(UserWatchHistoryRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userWatchHistoryService->update($request->validated(), $id);
        return redirect()->route('user_watch_histories.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userWatchHistoryService->deleteById($id);
        return redirect()->route('user_watch_histories.index')->with('success', 'Deleted successfully');
    }
}
