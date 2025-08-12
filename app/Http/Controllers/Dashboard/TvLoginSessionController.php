<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TvLoginSessionRequest;
use App\Services\TvLoginSessionService;

class TvLoginSessionController extends Controller
{
    /**
     * @var TvLoginSessionService
     */
    protected TvLoginSessionService $tvLoginSessionService;

    /**
     * DummyModel Constructor
     *
     * @param TvLoginSessionService $tvLoginSessionService
     *
     */
    public function __construct(TvLoginSessionService $tvLoginSessionService)
    {
        $this->tvLoginSessionService = $tvLoginSessionService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $tv_login_sessions = $this->tvLoginSessionService->getAll();
        return view('tv_login_sessions.index', compact('tv_login_sessions'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('tv_login_sessions.create');
    }

    public function store(TvLoginSessionRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->tvLoginSessionService->save($request->validated());
        return redirect()->route('tv_login_sessions.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $tvLoginSession = $this->tvLoginSessionService->getById($id);
        return view('tv_login_sessions.show', compact('tvLoginSession'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $tvLoginSession = $this->tvLoginSessionService->getById($id);
        return view('tv_login_sessions.edit', compact('tvLoginSession'));
    }

    public function update(TvLoginSessionRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->tvLoginSessionService->update($request->validated(), $id);
        return redirect()->route('tv_login_sessions.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->tvLoginSessionService->deleteById($id);
        return redirect()->route('tv_login_sessions.index')->with('success', 'Deleted successfully');
    }
}
