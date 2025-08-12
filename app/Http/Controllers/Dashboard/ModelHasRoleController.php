<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelHasRoleRequest;
use App\Services\ModelHasRoleService;

class ModelHasRoleController extends Controller
{
    /**
     * @var ModelHasRoleService
     */
    protected ModelHasRoleService $modelHasRoleService;

    /**
     * DummyModel Constructor
     *
     * @param ModelHasRoleService $modelHasRoleService
     *
     */
    public function __construct(ModelHasRoleService $modelHasRoleService)
    {
        $this->modelHasRoleService = $modelHasRoleService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $model_has_roles = $this->modelHasRoleService->getAll();
        return view('model_has_roles.index', compact('model_has_roles'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('model_has_roles.create');
    }

    public function store(ModelHasRoleRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->modelHasRoleService->save($request->validated());
        return redirect()->route('model_has_roles.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $modelHasRole = $this->modelHasRoleService->getById($id);
        return view('model_has_roles.show', compact('modelHasRole'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $modelHasRole = $this->modelHasRoleService->getById($id);
        return view('model_has_roles.edit', compact('modelHasRole'));
    }

    public function update(ModelHasRoleRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->modelHasRoleService->update($request->validated(), $id);
        return redirect()->route('model_has_roles.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->modelHasRoleService->deleteById($id);
        return redirect()->route('model_has_roles.index')->with('success', 'Deleted successfully');
    }
}
