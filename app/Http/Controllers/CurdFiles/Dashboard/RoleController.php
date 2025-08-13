<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Services\RoleService;

class RoleController extends Controller
{
    /**
     * @var RoleService
     */
    protected RoleService $roleService;

    /**
     * DummyModel Constructor
     *
     * @param RoleService $roleService
     *
     */
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $roles = $this->roleService->getAll();
        return view('roles.index', compact('roles'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('roles.create');
    }

    public function store(RoleRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->roleService->save($request->validated());
        return redirect()->route('roles.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $role = $this->roleService->getById($id);
        return view('roles.show', compact('role'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $role = $this->roleService->getById($id);
        return view('roles.edit', compact('role'));
    }

    public function update(RoleRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->roleService->update($request->validated(), $id);
        return redirect()->route('roles.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->roleService->deleteById($id);
        return redirect()->route('roles.index')->with('success', 'Deleted successfully');
    }
}
