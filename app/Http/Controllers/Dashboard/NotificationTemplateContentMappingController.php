<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationTemplateContentMappingRequest;
use App\Services\NotificationTemplateContentMappingService;

class NotificationTemplateContentMappingController extends Controller
{
    /**
     * @var NotificationTemplateContentMappingService
     */
    protected NotificationTemplateContentMappingService $notificationTemplateContentMappingService;

    /**
     * DummyModel Constructor
     *
     * @param NotificationTemplateContentMappingService $notificationTemplateContentMappingService
     *
     */
    public function __construct(NotificationTemplateContentMappingService $notificationTemplateContentMappingService)
    {
        $this->notificationTemplateContentMappingService = $notificationTemplateContentMappingService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $notification_template_content_mappings = $this->notificationTemplateContentMappingService->getAll();
        return view('notification_template_content_mappings.index', compact('notification_template_content_mappings'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('notification_template_content_mappings.create');
    }

    public function store(NotificationTemplateContentMappingRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->notificationTemplateContentMappingService->save($request->validated());
        return redirect()->route('notification_template_content_mappings.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $notificationTemplateContentMapping = $this->notificationTemplateContentMappingService->getById($id);
        return view('notification_template_content_mappings.show', compact('notificationTemplateContentMapping'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $notificationTemplateContentMapping = $this->notificationTemplateContentMappingService->getById($id);
        return view('notification_template_content_mappings.edit', compact('notificationTemplateContentMapping'));
    }

    public function update(NotificationTemplateContentMappingRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->notificationTemplateContentMappingService->update($request->validated(), $id);
        return redirect()->route('notification_template_content_mappings.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->notificationTemplateContentMappingService->deleteById($id);
        return redirect()->route('notification_template_content_mappings.index')->with('success', 'Deleted successfully');
    }
}
