<?php
namespace App\Services;

use App\Models\Banner;
use App\Repositories\BannerRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class BannerService
{
	/**
     * @var BannerRepository $bannerRepository
     */
    protected $bannerRepository;

    /**
     * DummyClass constructor.
     *
     * @param BannerRepository $bannerRepository
     */
    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * Get all bannerRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->bannerRepository->all();
    }

    /**
     * Get bannerRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->bannerRepository->getById($id);
    }

    /**
     * Validate bannerRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->bannerRepository->save($data);
    }

    /**
     * Update bannerRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $bannerRepository = $this->bannerRepository->update($data, $id);
            DB::commit();
            return $bannerRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete bannerRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $bannerRepository = $this->bannerRepository->delete($id);
            DB::commit();
            return $bannerRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
