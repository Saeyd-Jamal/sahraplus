<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CastCrewRequest;
use App\Services\CastCrewService;

class CastCrewController extends Controller
{
    /**
     * @var CastCrewService
     */
    protected CastCrewService $castCrewService;

    /**
     * DummyModel Constructor
     *
     * @param CastCrewService $castCrewService
     *
     */
    public function __construct(CastCrewService $castCrewService)
    {
        $this->castCrewService = $castCrewService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $cast_crews = $this->castCrewService->getAll();
        return view('cast_crews.index', compact('cast_crews'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('cast_crews.create');
    }

    public function store(CastCrewRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->castCrewService->save($request->validated());
        return redirect()->route('cast_crews.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $castCrew = $this->castCrewService->getById($id);
        return view('cast_crews.show', compact('castCrew'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $castCrew = $this->castCrewService->getById($id);
        return view('cast_crews.edit', compact('castCrew'));
    }

    public function update(CastCrewRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->castCrewService->update($request->validated(), $id);
        return redirect()->route('cast_crews.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->castCrewService->deleteById($id);
        return redirect()->route('cast_crews.index')->with('success', 'Deleted successfully');
    }
}
