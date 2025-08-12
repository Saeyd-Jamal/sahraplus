<?php
namespace App\Services;

use App\Models\Planlimitation;
use App\Repositories\PlanlimitationRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class PlanlimitationService
{
	/**
     * @var PlanlimitationRepository $planlimitationRepository
     */
    protected $planlimitationRepository;

    /**
     * DummyClass constructor.
     *
     * @param PlanlimitationRepository $planlimitationRepository
     */
    public function __construct(PlanlimitationRepository $planlimitationRepository)
    {
        $this->planlimitationRepository = $planlimitationRepository;
    }

    /**
     * Get all planlimitationRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->planlimitationRepository->all();
    }

    /**
     * Get planlimitationRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->planlimitationRepository->getById($id);
    }

    /**
     * Validate planlimitationRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->planlimitationRepository->save($data);
    }

    /**
     * Update planlimitationRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $planlimitationRepository = $this->planlimitationRepository->update($data, $id);
            DB::commit();
            return $planlimitationRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete planlimitationRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $planlimitationRepository = $this->planlimitationRepository->delete($id);
            DB::commit();
            return $planlimitationRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
