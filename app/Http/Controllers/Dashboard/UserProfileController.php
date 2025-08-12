<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileRequest;
use App\Services\UserProfileService;

class UserProfileController extends Controller
{
    /**
     * @var UserProfileService
     */
    protected UserProfileService $userProfileService;

    /**
     * DummyModel Constructor
     *
     * @param UserProfileService $userProfileService
     *
     */
    public function __construct(UserProfileService $userProfileService)
    {
        $this->userProfileService = $userProfileService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $user_profiles = $this->userProfileService->getAll();
        return view('user_profiles.index', compact('user_profiles'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('user_profiles.create');
    }

    public function store(UserProfileRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->userProfileService->save($request->validated());
        return redirect()->route('user_profiles.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $userProfile = $this->userProfileService->getById($id);
        return view('user_profiles.show', compact('userProfile'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $userProfile = $this->userProfileService->getById($id);
        return view('user_profiles.edit', compact('userProfile'));
    }

    public function update(UserProfileRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userProfileService->update($request->validated(), $id);
        return redirect()->route('user_profiles.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userProfileService->deleteById($id);
        return redirect()->route('user_profiles.index')->with('success', 'Deleted successfully');
    }
}
