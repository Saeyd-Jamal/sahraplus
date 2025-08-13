<?php
namespace App\Services;

use App\Models\LiveTvChannel;
use App\Repositories\LiveTvChannelRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class LiveTvChannelService
{
	/**
     * @var LiveTvChannelRepository $liveTvChannelRepository
     */
    protected $liveTvChannelRepository;

    /**
     * DummyClass constructor.
     *
     * @param LiveTvChannelRepository $liveTvChannelRepository
     */
    public function __construct(LiveTvChannelRepository $liveTvChannelRepository)
    {
        $this->liveTvChannelRepository = $liveTvChannelRepository;
    }

    /**
     * Get all liveTvChannelRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->liveTvChannelRepository->all();
    }

    /**
     * Get liveTvChannelRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->liveTvChannelRepository->getById($id);
    }

    /**
     * Validate liveTvChannelRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->liveTvChannelRepository->save($data);
    }

    /**
     * Update liveTvChannelRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $liveTvChannelRepository = $this->liveTvChannelRepository->update($data, $id);
            DB::commit();
            return $liveTvChannelRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete liveTvChannelRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $liveTvChannelRepository = $this->liveTvChannelRepository->delete($id);
            DB::commit();
            return $liveTvChannelRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
