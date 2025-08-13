<?php
namespace App\Services;

use App\Models\Role;
use App\Repositories\RoleRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class RoleService
{
	/**
     * @var RoleRepository $roleRepository
     */
    protected $roleRepository;

    /**
     * DummyClass constructor.
     *
     * @param RoleRepository $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Get all roleRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->roleRepository->all();
    }

    /**
     * Get roleRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->roleRepository->getById($id);
    }

    /**
     * Validate roleRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->roleRepository->save($data);
    }

    /**
     * Update roleRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $roleRepository = $this->roleRepository->update($data, $id);
            DB::commit();
            return $roleRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete roleRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $roleRepository = $this->roleRepository->delete($id);
            DB::commit();
            return $roleRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
