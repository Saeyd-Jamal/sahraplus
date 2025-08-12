<?php
namespace App\Services;

use App\Models\Genre;
use App\Repositories\GenreRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class GenreService
{
	/**
     * @var GenreRepository $genreRepository
     */
    protected $genreRepository;

    /**
     * DummyClass constructor.
     *
     * @param GenreRepository $genreRepository
     */
    public function __construct(GenreRepository $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    /**
     * Get all genreRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->genreRepository->all();
    }

    /**
     * Get genreRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->genreRepository->getById($id);
    }

    /**
     * Validate genreRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->genreRepository->save($data);
    }

    /**
     * Update genreRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $genreRepository = $this->genreRepository->update($data, $id);
            DB::commit();
            return $genreRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete genreRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $genreRepository = $this->genreRepository->delete($id);
            DB::commit();
            return $genreRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
