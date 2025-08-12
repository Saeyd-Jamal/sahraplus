<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SessionRequest;
use App\Services\SessionService;

class SessionController extends Controller
{
    /**
     * @var SessionService
     */
    protected SessionService $sessionService;

    /**
     * DummyModel Constructor
     *
     * @param SessionService $sessionService
     *
     */
    public function __construct(SessionService $sessionService)
    {
        $this->sessionService = $sessionService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $sessions = $this->sessionService->getAll();
        return view('sessions.index', compact('sessions'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('sessions.create');
    }

    public function store(SessionRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->sessionService->save($request->validated());
        return redirect()->route('sessions.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $session = $this->sessionService->getById($id);
        return view('sessions.show', compact('session'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $session = $this->sessionService->getById($id);
        return view('sessions.edit', compact('session'));
    }

    public function update(SessionRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->sessionService->update($request->validated(), $id);
        return redirect()->route('sessions.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->sessionService->deleteById($id);
        return redirect()->route('sessions.index')->with('success', 'Deleted successfully');
    }
}
