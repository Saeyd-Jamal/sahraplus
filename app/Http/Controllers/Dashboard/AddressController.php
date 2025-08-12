<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Services\AddressService;

class AddressController extends Controller
{
    /**
     * @var AddressService
     */
    protected AddressService $addressService;

    /**
     * DummyModel Constructor
     *
     * @param AddressService $addressService
     *
     */
    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $addresses = $this->addressService->getAll();
        return view('addresses.index', compact('addresses'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('addresses.create');
    }

    public function store(AddressRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->addressService->save($request->validated());
        return redirect()->route('addresses.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $address = $this->addressService->getById($id);
        return view('addresses.show', compact('address'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $address = $this->addressService->getById($id);
        return view('addresses.edit', compact('address'));
    }

    public function update(AddressRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->addressService->update($request->validated(), $id);
        return redirect()->route('addresses.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->addressService->deleteById($id);
        return redirect()->route('addresses.index')->with('success', 'Deleted successfully');
    }
}
