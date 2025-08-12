<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProviderRequest;
use App\Services\UserProviderService;

class UserProviderController extends Controller
{
    /**
     * @var UserProviderService
     */
    protected UserProviderService $userProviderService;

    /**
     * DummyModel Constructor
     *
     * @param UserProviderService $userProviderService
     *
     */
    public function __construct(UserProviderService $userProviderService)
    {
        $this->userProviderService = $userProviderService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $user_providers = $this->userProviderService->getAll();
        return view('user_providers.index', compact('user_providers'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('user_providers.create');
    }

    public function store(UserProviderRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->userProviderService->save($request->validated());
        return redirect()->route('user_providers.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $userProvider = $this->userProviderService->getById($id);
        return view('user_providers.show', compact('userProvider'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $userProvider = $this->userProviderService->getById($id);
        return view('user_providers.edit', compact('userProvider'));
    }

    public function update(UserProviderRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userProviderService->update($request->validated(), $id);
        return redirect()->route('user_providers.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userProviderService->deleteById($id);
        return redirect()->route('user_providers.index')->with('success', 'Deleted successfully');
    }
}
