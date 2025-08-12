<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use App\Services\SubscriptionService;

class SubscriptionController extends Controller
{
    /**
     * @var SubscriptionService
     */
    protected SubscriptionService $subscriptionService;

    /**
     * DummyModel Constructor
     *
     * @param SubscriptionService $subscriptionService
     *
     */
    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $subscriptions = $this->subscriptionService->getAll();
        return view('subscriptions.index', compact('subscriptions'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('subscriptions.create');
    }

    public function store(SubscriptionRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->subscriptionService->save($request->validated());
        return redirect()->route('subscriptions.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $subscription = $this->subscriptionService->getById($id);
        return view('subscriptions.show', compact('subscription'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $subscription = $this->subscriptionService->getById($id);
        return view('subscriptions.edit', compact('subscription'));
    }

    public function update(SubscriptionRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->subscriptionService->update($request->validated(), $id);
        return redirect()->route('subscriptions.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->subscriptionService->deleteById($id);
        return redirect()->route('subscriptions.index')->with('success', 'Deleted successfully');
    }
}
