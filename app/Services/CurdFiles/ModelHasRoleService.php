<?php
namespace App\Services;

use App\Models\ModelHasRole;
use App\Repositories\ModelHasRoleRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class ModelHasRoleService
{
	/**
     * @var ModelHasRoleRepository $modelHasRoleRepository
     */
    protected $modelHasRoleRepository;

    /**
     * DummyClass constructor.
     *
     * @param ModelHasRoleRepository $modelHasRoleRepository
     */
    public function __construct(ModelHasRoleRepository $modelHasRoleRepository)
    {
        $this->modelHasRoleRepository = $modelHasRoleRepository;
    }

    /**
     * Get all modelHasRoleRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->modelHasRoleRepository->all();
    }

    /**
     * Get modelHasRoleRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->modelHasRoleRepository->getById($id);
    }

    /**
     * Validate modelHasRoleRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->modelHasRoleRepository->save($data);
    }

    /**
     * Update modelHasRoleRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $modelHasRoleRepository = $this->modelHasRoleRepository->update($data, $id);
            DB::commit();
            return $modelHasRoleRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete modelHasRoleRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $modelHasRoleRepository = $this->modelHasRoleRepository->delete($id);
            DB::commit();
            return $modelHasRoleRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
