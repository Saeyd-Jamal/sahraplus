<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FailedJobRequest;
use App\Services\FailedJobService;

class FailedJobController extends Controller
{
    /**
     * @var FailedJobService
     */
    protected FailedJobService $failedJobService;

    /**
     * DummyModel Constructor
     *
     * @param FailedJobService $failedJobService
     *
     */
    public function __construct(FailedJobService $failedJobService)
    {
        $this->failedJobService = $failedJobService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $failed_jobs = $this->failedJobService->getAll();
        return view('failed_jobs.index', compact('failed_jobs'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('failed_jobs.create');
    }

    public function store(FailedJobRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->failedJobService->save($request->validated());
        return redirect()->route('failed_jobs.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $failedJob = $this->failedJobService->getById($id);
        return view('failed_jobs.show', compact('failedJob'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $failedJob = $this->failedJobService->getById($id);
        return view('failed_jobs.edit', compact('failedJob'));
    }

    public function update(FailedJobRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->failedJobService->update($request->validated(), $id);
        return redirect()->route('failed_jobs.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->failedJobService->deleteById($id);
        return redirect()->route('failed_jobs.index')->with('success', 'Deleted successfully');
    }
}
