<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserReminderRequest;
use App\Services\UserReminderService;

class UserReminderController extends Controller
{
    /**
     * @var UserReminderService
     */
    protected UserReminderService $userReminderService;

    /**
     * DummyModel Constructor
     *
     * @param UserReminderService $userReminderService
     *
     */
    public function __construct(UserReminderService $userReminderService)
    {
        $this->userReminderService = $userReminderService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $user_reminders = $this->userReminderService->getAll();
        return view('user_reminders.index', compact('user_reminders'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('user_reminders.create');
    }

    public function store(UserReminderRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->userReminderService->save($request->validated());
        return redirect()->route('user_reminders.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $userReminder = $this->userReminderService->getById($id);
        return view('user_reminders.show', compact('userReminder'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $userReminder = $this->userReminderService->getById($id);
        return view('user_reminders.edit', compact('userReminder'));
    }

    public function update(UserReminderRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userReminderService->update($request->validated(), $id);
        return redirect()->route('user_reminders.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userReminderService->deleteById($id);
        return redirect()->route('user_reminders.index')->with('success', 'Deleted successfully');
    }
}
