<?php
namespace App\Services;

use App\Models\UserMultiProfile;
use App\Repositories\UserMultiProfileRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class UserMultiProfileService
{
	/**
     * @var UserMultiProfileRepository $userMultiProfileRepository
     */
    protected $userMultiProfileRepository;

    /**
     * DummyClass constructor.
     *
     * @param UserMultiProfileRepository $userMultiProfileRepository
     */
    public function __construct(UserMultiProfileRepository $userMultiProfileRepository)
    {
        $this->userMultiProfileRepository = $userMultiProfileRepository;
    }

    /**
     * Get all userMultiProfileRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->userMultiProfileRepository->all();
    }

    /**
     * Get userMultiProfileRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->userMultiProfileRepository->getById($id);
    }

    /**
     * Validate userMultiProfileRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->userMultiProfileRepository->save($data);
    }

    /**
     * Update userMultiProfileRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $userMultiProfileRepository = $this->userMultiProfileRepository->update($data, $id);
            DB::commit();
            return $userMultiProfileRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete userMultiProfileRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $userMultiProfileRepository = $this->userMultiProfileRepository->delete($id);
            DB::commit();
            return $userMultiProfileRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
