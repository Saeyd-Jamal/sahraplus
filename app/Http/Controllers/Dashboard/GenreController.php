<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use App\Services\GenreService;
use Yajra\DataTables\Facades\DataTables;

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

    public function index()
    {
        $request = request();
        if($request->ajax()) {
            $genres = $this->genreService->getAll();
            return DataTables::of($genres)
                    ->addIndexColumn()  // إضافة عمود الترقيم التلقائي
                    ->addColumn('edit', function ($genre) {
                        return $genre->id;
                    })
                    ->make(true);
        }
        return view('dashboard.genres.index');
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        $genre = new Genre();
        return view('dashboard.genres.create', compact('genre'));
    }

    public function store(GenreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->genreService->save($request->validated());
        return redirect()->route('dashboard.genres.index')->with('success', 'Created successfully');
    }

    public function show(int $id): \Illuminate\Contracts\View\View
    {
        $genre = $this->genreService->getById($id);
        return view('dashboard.genres.show', compact('genre'));
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $genre = $this->genreService->getById($id);
        return view('dashboard.genres.edit', compact('genre'));
    }

    public function update(GenreRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->genreService->update($request->validated(), $id);
        return redirect()->route('dashboard.genres.index')->with('success', 'Updated successfully');
    }

    public function destroy(int $id)
    {
        $this->genreService->deleteById($id);
        $request = request();
        if($request->ajax()) {
            return response()->json([
                'status' => true,
                'message' => 'Deleted successfully'
            ]);
        }
        return redirect()->route('dashboard.genres.index')->with('success', 'Deleted successfully');
    }
}
