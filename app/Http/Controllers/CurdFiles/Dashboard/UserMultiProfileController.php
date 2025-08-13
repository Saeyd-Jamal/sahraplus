<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserMultiProfileRequest;
use App\Services\UserMultiProfileService;

class UserMultiProfileController extends Controller
{
    /**
     * @var UserMultiProfileService
     */
    protected UserMultiProfileService $userMultiProfileService;

    /**
     * DummyModel Constructor
     *
     * @param UserMultiProfileService $userMultiProfileService
     *
     */
    public function __construct(UserMultiProfileService $userMultiProfileService)
    {
        $this->userMultiProfileService = $userMultiProfileService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $user_multi_profiles = $this->userMultiProfileService->getAll();
        return view('user_multi_profiles.index', compact('user_multi_profiles'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('user_multi_profiles.create');
    }

    public function store(UserMultiProfileRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->userMultiProfileService->save($request->validated());
        return redirect()->route('user_multi_profiles.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $userMultiProfile = $this->userMultiProfileService->getById($id);
        return view('user_multi_profiles.show', compact('userMultiProfile'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $userMultiProfile = $this->userMultiProfileService->getById($id);
        return view('user_multi_profiles.edit', compact('userMultiProfile'));
    }

    public function update(UserMultiProfileRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userMultiProfileService->update($request->validated(), $id);
        return redirect()->route('user_multi_profiles.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userMultiProfileService->deleteById($id);
        return redirect()->route('user_multi_profiles.index')->with('success', 'Deleted successfully');
    }
}
