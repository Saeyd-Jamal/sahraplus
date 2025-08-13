<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSearchHistoryRequest;
use App\Services\UserSearchHistoryService;

class UserSearchHistoryController extends Controller
{
    /**
     * @var UserSearchHistoryService
     */
    protected UserSearchHistoryService $userSearchHistoryService;

    /**
     * DummyModel Constructor
     *
     * @param UserSearchHistoryService $userSearchHistoryService
     *
     */
    public function __construct(UserSearchHistoryService $userSearchHistoryService)
    {
        $this->userSearchHistoryService = $userSearchHistoryService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $user_search_histories = $this->userSearchHistoryService->getAll();
        return view('user_search_histories.index', compact('user_search_histories'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('user_search_histories.create');
    }

    public function store(UserSearchHistoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->userSearchHistoryService->save($request->validated());
        return redirect()->route('user_search_histories.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $userSearchHistory = $this->userSearchHistoryService->getById($id);
        return view('user_search_histories.show', compact('userSearchHistory'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $userSearchHistory = $this->userSearchHistoryService->getById($id);
        return view('user_search_histories.edit', compact('userSearchHistory'));
    }

    public function update(UserSearchHistoryRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userSearchHistoryService->update($request->validated(), $id);
        return redirect()->route('user_search_histories.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userSearchHistoryService->deleteById($id);
        return redirect()->route('user_search_histories.index')->with('success', 'Deleted successfully');
    }
}
