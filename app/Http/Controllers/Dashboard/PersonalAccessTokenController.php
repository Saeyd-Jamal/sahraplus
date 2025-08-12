<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonalAccessTokenRequest;
use App\Services\PersonalAccessTokenService;

class PersonalAccessTokenController extends Controller
{
    /**
     * @var PersonalAccessTokenService
     */
    protected PersonalAccessTokenService $personalAccessTokenService;

    /**
     * DummyModel Constructor
     *
     * @param PersonalAccessTokenService $personalAccessTokenService
     *
     */
    public function __construct(PersonalAccessTokenService $personalAccessTokenService)
    {
        $this->personalAccessTokenService = $personalAccessTokenService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $personal_access_tokens = $this->personalAccessTokenService->getAll();
        return view('personal_access_tokens.index', compact('personal_access_tokens'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('personal_access_tokens.create');
    }

    public function store(PersonalAccessTokenRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->personalAccessTokenService->save($request->validated());
        return redirect()->route('personal_access_tokens.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $personalAccessToken = $this->personalAccessTokenService->getById($id);
        return view('personal_access_tokens.show', compact('personalAccessToken'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $personalAccessToken = $this->personalAccessTokenService->getById($id);
        return view('personal_access_tokens.edit', compact('personalAccessToken'));
    }

    public function update(PersonalAccessTokenRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->personalAccessTokenService->update($request->validated(), $id);
        return redirect()->route('personal_access_tokens.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->personalAccessTokenService->deleteById($id);
        return redirect()->route('personal_access_tokens.index')->with('success', 'Deleted successfully');
    }
}
