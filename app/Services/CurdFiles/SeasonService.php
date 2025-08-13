<?php
namespace App\Services;

use App\Models\Season;
use App\Repositories\SeasonRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class SeasonService
{
	/**
     * @var SeasonRepository $seasonRepository
     */
    protected $seasonRepository;

    /**
     * DummyClass constructor.
     *
     * @param SeasonRepository $seasonRepository
     */
    public function __construct(SeasonRepository $seasonRepository)
    {
        $this->seasonRepository = $seasonRepository;
    }

    /**
     * Get all seasonRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->seasonRepository->all();
    }

    /**
     * Get seasonRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->seasonRepository->getById($id);
    }

    /**
     * Validate seasonRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->seasonRepository->save($data);
    }

    /**
     * Update seasonRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $seasonRepository = $this->seasonRepository->update($data, $id);
            DB::commit();
            return $seasonRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete seasonRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $seasonRepository = $this->seasonRepository->delete($id);
            DB::commit();
            return $seasonRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
