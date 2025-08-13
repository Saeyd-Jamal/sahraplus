<?php
namespace App\Repositories;

use App\Models\Genre;
use Illuminate\Support\Str;

class GenreRepository
{
	 /**
     * @var Genre
     */
    protected Genre $genre;

    /**
     * Genre constructor.
     *
     * @param Genre $genre
     */
    public function __construct(Genre $genre)
    {
        $this->genre = $genre;
    }

    /**
     * Get all genre.
     *
     * @return Genre $genre
     */
    public function all()
    {
        return $this->genre->get();
    }

     /**
     * Get genre by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->genre->find($id);
    }

    /**
     * Save Genre
     *
     * @param $data
     * @return Genre
     */
     public function save(array $data)
    {
        $data['slug'] = Str::slug($data['name']);
        return Genre::create($data);
    }

     /**
     * Update Genre
     *
     * @param $data
     * @return Genre
     */
    public function update(array $data, int $id)
    {
        $data['slug'] = Str::slug($data['name']);
        $genre = $this->genre->find($id);
        $genre->update($data);
        return $genre;
    }

    /**
     * Delete Genre
     *
     * @param $data
     * @return Genre
     */
   	 public function delete(int $id)
    {
        $genre = $this->genre->find($id);
        $genre->delete();
        return $genre;
    }
}
