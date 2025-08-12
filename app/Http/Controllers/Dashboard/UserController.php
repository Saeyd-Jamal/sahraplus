<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    protected UserService $userService;

    /**
     * DummyModel Constructor
     *
     * @param UserService $userService
     *
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $users = $this->userService->getAll();
        return view('users.index', compact('users'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('users.create');
    }

    public function store(UserRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->userService->save($request->validated());
        return redirect()->route('users.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $user = $this->userService->getById($id);
        return view('users.show', compact('user'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $user = $this->userService->getById($id);
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userService->update($request->validated(), $id);
        return redirect()->route('users.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userService->deleteById($id);
        return redirect()->route('users.index')->with('success', 'Deleted successfully');
    }
}
