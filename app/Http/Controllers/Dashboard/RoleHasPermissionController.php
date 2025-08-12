<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleHasPermissionRequest;
use App\Services\RoleHasPermissionService;

class RoleHasPermissionController extends Controller
{
    /**
     * @var RoleHasPermissionService
     */
    protected RoleHasPermissionService $roleHasPermissionService;

    /**
     * DummyModel Constructor
     *
     * @param RoleHasPermissionService $roleHasPermissionService
     *
     */
    public function __construct(RoleHasPermissionService $roleHasPermissionService)
    {
        $this->roleHasPermissionService = $roleHasPermissionService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $role_has_permissions = $this->roleHasPermissionService->getAll();
        return view('role_has_permissions.index', compact('role_has_permissions'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('role_has_permissions.create');
    }

    public function store(RoleHasPermissionRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->roleHasPermissionService->save($request->validated());
        return redirect()->route('role_has_permissions.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $roleHasPermission = $this->roleHasPermissionService->getById($id);
        return view('role_has_permissions.show', compact('roleHasPermission'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $roleHasPermission = $this->roleHasPermissionService->getById($id);
        return view('role_has_permissions.edit', compact('roleHasPermission'));
    }

    public function update(RoleHasPermissionRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->roleHasPermissionService->update($request->validated(), $id);
        return redirect()->route('role_has_permissions.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->roleHasPermissionService->deleteById($id);
        return redirect()->route('role_has_permissions.index')->with('success', 'Deleted successfully');
    }
}
