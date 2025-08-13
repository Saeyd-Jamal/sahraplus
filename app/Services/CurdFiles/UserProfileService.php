<?php
namespace App\Services;

use App\Models\UserProfile;
use App\Repositories\UserProfileRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class UserProfileService
{
	/**
     * @var UserProfileRepository $userProfileRepository
     */
    protected $userProfileRepository;

    /**
     * DummyClass constructor.
     *
     * @param UserProfileRepository $userProfileRepository
     */
    public function __construct(UserProfileRepository $userProfileRepository)
    {
        $this->userProfileRepository = $userProfileRepository;
    }

    /**
     * Get all userProfileRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->userProfileRepository->all();
    }

    /**
     * Get userProfileRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->userProfileRepository->getById($id);
    }

    /**
     * Validate userProfileRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->userProfileRepository->save($data);
    }

    /**
     * Update userProfileRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $userProfileRepository = $this->userProfileRepository->update($data, $id);
            DB::commit();
            return $userProfileRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete userProfileRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $userProfileRepository = $this->userProfileRepository->delete($id);
            DB::commit();
            return $userProfileRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
