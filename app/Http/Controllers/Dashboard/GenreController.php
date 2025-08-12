<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Services\GenreService;

class GenreController extends Controller
{
    /**
     * @var GenreService
     */
    protected GenreService $genreService;

    /**
     * DummyModel Constructor
     *
     * @param GenreService $genreService
     *
     */
    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $genres = $this->genreService->getAll();
        return view('genres.index', compact('genres'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('genres.create');
    }

    public function store(GenreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->genreService->save($request->validated());
        return redirect()->route('genres.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $genre = $this->genreService->getById($id);
        return view('genres.show', compact('genre'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $genre = $this->genreService->getById($id);
        return view('genres.edit', compact('genre'));
    }

    public function update(GenreRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->genreService->update($request->validated(), $id);
        return redirect()->route('genres.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->genreService->deleteById($id);
        return redirect()->route('genres.index')->with('success', 'Deleted successfully');
    }
}
