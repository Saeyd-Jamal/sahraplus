<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Services\JobService;

class JobController extends Controller
{
    /**
     * @var JobService
     */
    protected JobService $jobService;

    /**
     * DummyModel Constructor
     *
     * @param JobService $jobService
     *
     */
    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $jobs = $this->jobService->getAll();
        return view('jobs.index', compact('jobs'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('jobs.create');
    }

    public function store(JobRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->jobService->save($request->validated());
        return redirect()->route('jobs.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $job = $this->jobService->getById($id);
        return view('jobs.show', compact('job'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $job = $this->jobService->getById($id);
        return view('jobs.edit', compact('job'));
    }

    public function update(JobRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->jobService->update($request->validated(), $id);
        return redirect()->route('jobs.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->jobService->deleteById($id);
        return redirect()->route('jobs.index')->with('success', 'Deleted successfully');
    }
}
