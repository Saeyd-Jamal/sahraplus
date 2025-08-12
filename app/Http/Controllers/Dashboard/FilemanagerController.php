<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilemanagerRequest;
use App\Services\FilemanagerService;

class FilemanagerController extends Controller
{
    /**
     * @var FilemanagerService
     */
    protected FilemanagerService $filemanagerService;

    /**
     * DummyModel Constructor
     *
     * @param FilemanagerService $filemanagerService
     *
     */
    public function __construct(FilemanagerService $filemanagerService)
    {
        $this->filemanagerService = $filemanagerService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $filemanagers = $this->filemanagerService->getAll();
        return view('filemanagers.index', compact('filemanagers'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('filemanagers.create');
    }

    public function store(FilemanagerRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->filemanagerService->save($request->validated());
        return redirect()->route('filemanagers.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $filemanager = $this->filemanagerService->getById($id);
        return view('filemanagers.show', compact('filemanager'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $filemanager = $this->filemanagerService->getById($id);
        return view('filemanagers.edit', compact('filemanager'));
    }

    public function update(FilemanagerRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->filemanagerService->update($request->validated(), $id);
        return redirect()->route('filemanagers.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->filemanagerService->deleteById($id);
        return redirect()->route('filemanagers.index')->with('success', 'Deleted successfully');
    }
}
