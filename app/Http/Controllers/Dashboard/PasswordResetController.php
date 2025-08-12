<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetRequest;
use App\Services\PasswordResetService;

class PasswordResetController extends Controller
{
    /**
     * @var PasswordResetService
     */
    protected PasswordResetService $passwordResetService;

    /**
     * DummyModel Constructor
     *
     * @param PasswordResetService $passwordResetService
     *
     */
    public function __construct(PasswordResetService $passwordResetService)
    {
        $this->passwordResetService = $passwordResetService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $password_resets = $this->passwordResetService->getAll();
        return view('password_resets.index', compact('password_resets'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('password_resets.create');
    }

    public function store(PasswordResetRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->passwordResetService->save($request->validated());
        return redirect()->route('password_resets.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $passwordReset = $this->passwordResetService->getById($id);
        return view('password_resets.show', compact('passwordReset'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $passwordReset = $this->passwordResetService->getById($id);
        return view('password_resets.edit', compact('passwordReset'));
    }

    public function update(PasswordResetRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->passwordResetService->update($request->validated(), $id);
        return redirect()->route('password_resets.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->passwordResetService->deleteById($id);
        return redirect()->route('password_resets.index')->with('success', 'Deleted successfully');
    }
}
