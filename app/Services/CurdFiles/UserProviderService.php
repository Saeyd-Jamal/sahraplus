<?php
namespace App\Services;

use App\Models\UserProvider;
use App\Repositories\UserProviderRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class UserProviderService
{
	/**
     * @var UserProviderRepository $userProviderRepository
     */
    protected $userProviderRepository;

    /**
     * DummyClass constructor.
     *
     * @param UserProviderRepository $userProviderRepository
     */
    public function __construct(UserProviderRepository $userProviderRepository)
    {
        $this->userProviderRepository = $userProviderRepository;
    }

    /**
     * Get all userProviderRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->userProviderRepository->all();
    }

    /**
     * Get userProviderRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->userProviderRepository->getById($id);
    }

    /**
     * Validate userProviderRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->userProviderRepository->save($data);
    }

    /**
     * Update userProviderRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $userProviderRepository = $this->userProviderRepository->update($data, $id);
            DB::commit();
            return $userProviderRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete userProviderRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $userProviderRepository = $this->userProviderRepository->delete($id);
            DB::commit();
            return $userProviderRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
