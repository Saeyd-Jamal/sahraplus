<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionsTransactionRequest;
use App\Services\SubscriptionsTransactionService;

class SubscriptionsTransactionController extends Controller
{
    /**
     * @var SubscriptionsTransactionService
     */
    protected SubscriptionsTransactionService $subscriptionsTransactionService;

    /**
     * DummyModel Constructor
     *
     * @param SubscriptionsTransactionService $subscriptionsTransactionService
     *
     */
    public function __construct(SubscriptionsTransactionService $subscriptionsTransactionService)
    {
        $this->subscriptionsTransactionService = $subscriptionsTransactionService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $subscriptions_transactions = $this->subscriptionsTransactionService->getAll();
        return view('subscriptions_transactions.index', compact('subscriptions_transactions'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('subscriptions_transactions.create');
    }

    public function store(SubscriptionsTransactionRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->subscriptionsTransactionService->save($request->validated());
        return redirect()->route('subscriptions_transactions.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $subscriptionsTransaction = $this->subscriptionsTransactionService->getById($id);
        return view('subscriptions_transactions.show', compact('subscriptionsTransaction'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $subscriptionsTransaction = $this->subscriptionsTransactionService->getById($id);
        return view('subscriptions_transactions.edit', compact('subscriptionsTransaction'));
    }

    public function update(SubscriptionsTransactionRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->subscriptionsTransactionService->update($request->validated(), $id);
        return redirect()->route('subscriptions_transactions.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->subscriptionsTransactionService->deleteById($id);
        return redirect()->route('subscriptions_transactions.index')->with('success', 'Deleted successfully');
    }
}
