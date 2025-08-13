<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobBatchRequest;
use App\Services\JobBatchService;

class JobBatchController extends Controller
{
    /**
     * @var JobBatchService
     */
    protected JobBatchService $jobBatchService;

    /**
     * DummyModel Constructor
     *
     * @param JobBatchService $jobBatchService
     *
     */
    public function __construct(JobBatchService $jobBatchService)
    {
        $this->jobBatchService = $jobBatchService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $job_batches = $this->jobBatchService->getAll();
        return view('job_batches.index', compact('job_batches'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('job_batches.create');
    }

    public function store(JobBatchRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->jobBatchService->save($request->validated());
        return redirect()->route('job_batches.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $jobBatch = $this->jobBatchService->getById($id);
        return view('job_batches.show', compact('jobBatch'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $jobBatch = $this->jobBatchService->getById($id);
        return view('job_batches.edit', compact('jobBatch'));
    }

    public function update(JobBatchRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->jobBatchService->update($request->validated(), $id);
        return redirect()->route('job_batches.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->jobBatchService->deleteById($id);
        return redirect()->route('job_batches.index')->with('success', 'Deleted successfully');
    }
}
