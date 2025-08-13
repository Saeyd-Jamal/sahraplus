<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstallerRequest;
use App\Services\InstallerService;

class InstallerController extends Controller
{
    /**
     * @var InstallerService
     */
    protected InstallerService $installerService;

    /**
     * DummyModel Constructor
     *
     * @param InstallerService $installerService
     *
     */
    public function __construct(InstallerService $installerService)
    {
        $this->installerService = $installerService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $installers = $this->installerService->getAll();
        return view('installers.index', compact('installers'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('installers.create');
    }

    public function store(InstallerRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->installerService->save($request->validated());
        return redirect()->route('installers.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $installer = $this->installerService->getById($id);
        return view('installers.show', compact('installer'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $installer = $this->installerService->getById($id);
        return view('installers.edit', compact('installer'));
    }

    public function update(InstallerRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->installerService->update($request->validated(), $id);
        return redirect()->route('installers.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->installerService->deleteById($id);
        return redirect()->route('installers.index')->with('success', 'Deleted successfully');
    }
}
