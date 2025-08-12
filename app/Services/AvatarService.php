<?php
namespace App\Services;

use App\Models\Avatar;
use App\Repositories\AvatarRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class AvatarService
{
	/**
     * @var AvatarRepository $avatarRepository
     */
    protected $avatarRepository;

    /**
     * DummyClass constructor.
     *
     * @param AvatarRepository $avatarRepository
     */
    public function __construct(AvatarRepository $avatarRepository)
    {
        $this->avatarRepository = $avatarRepository;
    }

    /**
     * Get all avatarRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->avatarRepository->all();
    }

    /**
     * Get avatarRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->avatarRepository->getById($id);
    }

    /**
     * Validate avatarRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->avatarRepository->save($data);
    }

    /**
     * Update avatarRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $avatarRepository = $this->avatarRepository->update($data, $id);
            DB::commit();
            return $avatarRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete avatarRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $avatarRepository = $this->avatarRepository->delete($id);
            DB::commit();
            return $avatarRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
