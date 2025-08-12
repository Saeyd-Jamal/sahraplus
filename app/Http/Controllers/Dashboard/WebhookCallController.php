<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebhookCallRequest;
use App\Services\WebhookCallService;

class WebhookCallController extends Controller
{
    /**
     * @var WebhookCallService
     */
    protected WebhookCallService $webhookCallService;

    /**
     * DummyModel Constructor
     *
     * @param WebhookCallService $webhookCallService
     *
     */
    public function __construct(WebhookCallService $webhookCallService)
    {
        $this->webhookCallService = $webhookCallService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $webhook_calls = $this->webhookCallService->getAll();
        return view('webhook_calls.index', compact('webhook_calls'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('webhook_calls.create');
    }

    public function store(WebhookCallRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->webhookCallService->save($request->validated());
        return redirect()->route('webhook_calls.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $webhookCall = $this->webhookCallService->getById($id);
        return view('webhook_calls.show', compact('webhookCall'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $webhookCall = $this->webhookCallService->getById($id);
        return view('webhook_calls.edit', compact('webhookCall'));
    }

    public function update(WebhookCallRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->webhookCallService->update($request->validated(), $id);
        return redirect()->route('webhook_calls.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->webhookCallService->deleteById($id);
        return redirect()->route('webhook_calls.index')->with('success', 'Deleted successfully');
    }
}
