<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MediaRequest;
use App\Services\MediaService;

class MediaController extends Controller
{
    /**
     * @var MediaService
     */
    protected MediaService $mediaService;

    /**
     * DummyModel Constructor
     *
     * @param MediaService $mediaService
     *
     */
    public function __construct(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $media = $this->mediaService->getAll();
        return view('media.index', compact('media'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('media.create');
    }

    public function store(MediaRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->mediaService->save($request->validated());
        return redirect()->route('media.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $media = $this->mediaService->getById($id);
        return view('media.show', compact('media'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $media = $this->mediaService->getById($id);
        return view('media.edit', compact('media'));
    }

    public function update(MediaRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->mediaService->update($request->validated(), $id);
        return redirect()->route('media.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->mediaService->deleteById($id);
        return redirect()->route('media.index')->with('success', 'Deleted successfully');
    }
}
