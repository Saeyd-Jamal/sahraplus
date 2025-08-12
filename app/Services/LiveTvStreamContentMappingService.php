<?php
namespace App\Services;

use App\Models\LiveTvStreamContentMapping;
use App\Repositories\LiveTvStreamContentMappingRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class LiveTvStreamContentMappingService
{
	/**
     * @var LiveTvStreamContentMappingRepository $liveTvStreamContentMappingRepository
     */
    protected $liveTvStreamContentMappingRepository;

    /**
     * DummyClass constructor.
     *
     * @param LiveTvStreamContentMappingRepository $liveTvStreamContentMappingRepository
     */
    public function __construct(LiveTvStreamContentMappingRepository $liveTvStreamContentMappingRepository)
    {
        $this->liveTvStreamContentMappingRepository = $liveTvStreamContentMappingRepository;
    }

    /**
     * Get all liveTvStreamContentMappingRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->liveTvStreamContentMappingRepository->all();
    }

    /**
     * Get liveTvStreamContentMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->liveTvStreamContentMappingRepository->getById($id);
    }

    /**
     * Validate liveTvStreamContentMappingRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->liveTvStreamContentMappingRepository->save($data);
    }

    /**
     * Update liveTvStreamContentMappingRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $liveTvStreamContentMappingRepository = $this->liveTvStreamContentMappingRepository->update($data, $id);
            DB::commit();
            return $liveTvStreamContentMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete liveTvStreamContentMappingRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $liveTvStreamContentMappingRepository = $this->liveTvStreamContentMappingRepository->delete($id);
            DB::commit();
            return $liveTvStreamContentMappingRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
