<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarRequest;
use App\Services\AvatarService;

class AvatarController extends Controller
{
    /**
     * @var AvatarService
     */
    protected AvatarService $avatarService;

    /**
     * DummyModel Constructor
     *
     * @param AvatarService $avatarService
     *
     */
    public function __construct(AvatarService $avatarService)
    {
        $this->avatarService = $avatarService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $avatars = $this->avatarService->getAll();
        return view('avatars.index', compact('avatars'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('avatars.create');
    }

    public function store(AvatarRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->avatarService->save($request->validated());
        return redirect()->route('avatars.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $avatar = $this->avatarService->getById($id);
        return view('avatars.show', compact('avatar'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $avatar = $this->avatarService->getById($id);
        return view('avatars.edit', compact('avatar'));
    }

    public function update(AvatarRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->avatarService->update($request->validated(), $id);
        return redirect()->route('avatars.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->avatarService->deleteById($id);
        return redirect()->route('avatars.index')->with('success', 'Deleted successfully');
    }
}
