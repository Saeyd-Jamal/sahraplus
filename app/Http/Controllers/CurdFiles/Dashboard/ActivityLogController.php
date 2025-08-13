<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityLogRequest;
use App\Services\ActivityLogService;

class ActivityLogController extends Controller
{
    /**
     * @var ActivityLogService
     */
    protected ActivityLogService $activityLogService;

    /**
     * DummyModel Constructor
     *
     * @param ActivityLogService $activityLogService
     *
     */
    public function __construct(ActivityLogService $activityLogService)
    {
        $this->activityLogService = $activityLogService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $activity_logs = $this->activityLogService->getAll();
        return view('activity_logs.index', compact('activity_logs'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('activity_logs.create');
    }

    public function store(ActivityLogRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->activityLogService->save($request->validated());
        return redirect()->route('activity_logs.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $activityLog = $this->activityLogService->getById($id);
        return view('activity_logs.show', compact('activityLog'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $activityLog = $this->activityLogService->getById($id);
        return view('activity_logs.edit', compact('activityLog'));
    }

    public function update(ActivityLogRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->activityLogService->update($request->validated(), $id);
        return redirect()->route('activity_logs.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->activityLogService->deleteById($id);
        return redirect()->route('activity_logs.index')->with('success', 'Deleted successfully');
    }
}
