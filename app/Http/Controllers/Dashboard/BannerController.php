<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Services\BannerService;

class BannerController extends Controller
{
    /**
     * @var BannerService
     */
    protected BannerService $bannerService;

    /**
     * DummyModel Constructor
     *
     * @param BannerService $bannerService
     *
     */
    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $banners = $this->bannerService->getAll();
        return view('banners.index', compact('banners'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('banners.create');
    }

    public function store(BannerRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->bannerService->save($request->validated());
        return redirect()->route('banners.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $banner = $this->bannerService->getById($id);
        return view('banners.show', compact('banner'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $banner = $this->bannerService->getById($id);
        return view('banners.edit', compact('banner'));
    }

    public function update(BannerRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->bannerService->update($request->validated(), $id);
        return redirect()->route('banners.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->bannerService->deleteById($id);
        return redirect()->route('banners.index')->with('success', 'Deleted successfully');
    }
}
