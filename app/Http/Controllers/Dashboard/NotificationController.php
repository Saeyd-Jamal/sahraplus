<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Services\NotificationService;

class NotificationController extends Controller
{
    /**
     * @var NotificationService
     */
    protected NotificationService $notificationService;

    /**
     * DummyModel Constructor
     *
     * @param NotificationService $notificationService
     *
     */
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $notifications = $this->notificationService->getAll();
        return view('notifications.index', compact('notifications'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('notifications.create');
    }

    public function store(NotificationRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->notificationService->save($request->validated());
        return redirect()->route('notifications.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $notification = $this->notificationService->getById($id);
        return view('notifications.show', compact('notification'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $notification = $this->notificationService->getById($id);
        return view('notifications.edit', compact('notification'));
    }

    public function update(NotificationRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->notificationService->update($request->validated(), $id);
        return redirect()->route('notifications.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->notificationService->deleteById($id);
        return redirect()->route('notifications.index')->with('success', 'Deleted successfully');
    }
}
