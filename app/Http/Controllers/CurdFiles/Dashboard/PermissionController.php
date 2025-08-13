<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Services\PermissionService;

class PermissionController extends Controller
{
    /**
     * @var PermissionService
     */
    protected PermissionService $permissionService;

    /**
     * DummyModel Constructor
     *
     * @param PermissionService $permissionService
     *
     */
    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $permissions = $this->permissionService->getAll();
        return view('permissions.index', compact('permissions'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('permissions.create');
    }

    public function store(PermissionRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->permissionService->save($request->validated());
        return redirect()->route('permissions.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $permission = $this->permissionService->getById($id);
        return view('permissions.show', compact('permission'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $permission = $this->permissionService->getById($id);
        return view('permissions.edit', compact('permission'));
    }

    public function update(PermissionRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->permissionService->update($request->validated(), $id);
        return redirect()->route('permissions.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->permissionService->deleteById($id);
        return redirect()->route('permissions.index')->with('success', 'Deleted successfully');
    }
}
