<?php
namespace App\Services;

use App\Models\SliderItem;
use App\Repositories\SliderItemRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class SliderItemService
{
	/**
     * @var SliderItemRepository $sliderItemRepository
     */
    protected $sliderItemRepository;

    /**
     * DummyClass constructor.
     *
     * @param SliderItemRepository $sliderItemRepository
     */
    public function __construct(SliderItemRepository $sliderItemRepository)
    {
        $this->sliderItemRepository = $sliderItemRepository;
    }

    /**
     * Get all sliderItemRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->sliderItemRepository->all();
    }

    /**
     * Get sliderItemRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->sliderItemRepository->getById($id);
    }

    /**
     * Validate sliderItemRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->sliderItemRepository->save($data);
    }

    /**
     * Update sliderItemRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $sliderItemRepository = $this->sliderItemRepository->update($data, $id);
            DB::commit();
            return $sliderItemRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete sliderItemRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $sliderItemRepository = $this->sliderItemRepository->delete($id);
            DB::commit();
            return $sliderItemRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
