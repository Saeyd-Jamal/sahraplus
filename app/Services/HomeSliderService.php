<?php
namespace App\Services;

use App\Models\HomeSlider;
use App\Repositories\HomeSliderRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class HomeSliderService
{
	/**
     * @var HomeSliderRepository $homeSliderRepository
     */
    protected $homeSliderRepository;

    /**
     * DummyClass constructor.
     *
     * @param HomeSliderRepository $homeSliderRepository
     */
    public function __construct(HomeSliderRepository $homeSliderRepository)
    {
        $this->homeSliderRepository = $homeSliderRepository;
    }

    /**
     * Get all homeSliderRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->homeSliderRepository->all();
    }

    /**
     * Get homeSliderRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->homeSliderRepository->getById($id);
    }

    /**
     * Validate homeSliderRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->homeSliderRepository->save($data);
    }

    /**
     * Update homeSliderRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $homeSliderRepository = $this->homeSliderRepository->update($data, $id);
            DB::commit();
            return $homeSliderRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete homeSliderRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $homeSliderRepository = $this->homeSliderRepository->delete($id);
            DB::commit();
            return $homeSliderRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
