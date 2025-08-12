<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelHasPermissionRequest;
use App\Services\ModelHasPermissionService;

class ModelHasPermissionController extends Controller
{
    /**
     * @var ModelHasPermissionService
     */
    protected ModelHasPermissionService $modelHasPermissionService;

    /**
     * DummyModel Constructor
     *
     * @param ModelHasPermissionService $modelHasPermissionService
     *
     */
    public function __construct(ModelHasPermissionService $modelHasPermissionService)
    {
        $this->modelHasPermissionService = $modelHasPermissionService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $model_has_permissions = $this->modelHasPermissionService->getAll();
        return view('model_has_permissions.index', compact('model_has_permissions'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('model_has_permissions.create');
    }

    public function store(ModelHasPermissionRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->modelHasPermissionService->save($request->validated());
        return redirect()->route('model_has_permissions.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $modelHasPermission = $this->modelHasPermissionService->getById($id);
        return view('model_has_permissions.show', compact('modelHasPermission'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $modelHasPermission = $this->modelHasPermissionService->getById($id);
        return view('model_has_permissions.edit', compact('modelHasPermission'));
    }

    public function update(ModelHasPermissionRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->modelHasPermissionService->update($request->validated(), $id);
        return redirect()->route('model_has_permissions.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->modelHasPermissionService->deleteById($id);
        return redirect()->route('model_has_permissions.index')->with('success', 'Deleted successfully');
    }
}
