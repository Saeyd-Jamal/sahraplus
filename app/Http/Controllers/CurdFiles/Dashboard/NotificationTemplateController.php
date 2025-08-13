<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationTemplateRequest;
use App\Services\NotificationTemplateService;

class NotificationTemplateController extends Controller
{
    /**
     * @var NotificationTemplateService
     */
    protected NotificationTemplateService $notificationTemplateService;

    /**
     * DummyModel Constructor
     *
     * @param NotificationTemplateService $notificationTemplateService
     *
     */
    public function __construct(NotificationTemplateService $notificationTemplateService)
    {
        $this->notificationTemplateService = $notificationTemplateService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $notification_templates = $this->notificationTemplateService->getAll();
        return view('notification_templates.index', compact('notification_templates'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('notification_templates.create');
    }

    public function store(NotificationTemplateRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->notificationTemplateService->save($request->validated());
        return redirect()->route('notification_templates.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $notificationTemplate = $this->notificationTemplateService->getById($id);
        return view('notification_templates.show', compact('notificationTemplate'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $notificationTemplate = $this->notificationTemplateService->getById($id);
        return view('notification_templates.edit', compact('notificationTemplate'));
    }

    public function update(NotificationTemplateRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->notificationTemplateService->update($request->validated(), $id);
        return redirect()->route('notification_templates.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->notificationTemplateService->deleteById($id);
        return redirect()->route('notification_templates.index')->with('success', 'Deleted successfully');
    }
}
