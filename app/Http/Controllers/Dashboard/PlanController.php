<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use App\Services\PlanService;

class PlanController extends Controller
{
    /**
     * @var PlanService
     */
    protected PlanService $planService;

    /**
     * DummyModel Constructor
     *
     * @param PlanService $planService
     *
     */
    public function __construct(PlanService $planService)
    {
        $this->planService = $planService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $plans = $this->planService->getAll();
        return view('plans.index', compact('plans'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('plans.create');
    }

    public function store(PlanRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->planService->save($request->validated());
        return redirect()->route('plans.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $plan = $this->planService->getById($id);
        return view('plans.show', compact('plan'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $plan = $this->planService->getById($id);
        return view('plans.edit', compact('plan'));
    }

    public function update(PlanRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->planService->update($request->validated(), $id);
        return redirect()->route('plans.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->planService->deleteById($id);
        return redirect()->route('plans.index')->with('success', 'Deleted successfully');
    }
}
