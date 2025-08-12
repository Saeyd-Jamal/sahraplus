<?php
namespace App\Services;

use App\Models\PersonalAccessToken;
use App\Repositories\PersonalAccessTokenRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class PersonalAccessTokenService
{
	/**
     * @var PersonalAccessTokenRepository $personalAccessTokenRepository
     */
    protected $personalAccessTokenRepository;

    /**
     * DummyClass constructor.
     *
     * @param PersonalAccessTokenRepository $personalAccessTokenRepository
     */
    public function __construct(PersonalAccessTokenRepository $personalAccessTokenRepository)
    {
        $this->personalAccessTokenRepository = $personalAccessTokenRepository;
    }

    /**
     * Get all personalAccessTokenRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->personalAccessTokenRepository->all();
    }

    /**
     * Get personalAccessTokenRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->personalAccessTokenRepository->getById($id);
    }

    /**
     * Validate personalAccessTokenRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->personalAccessTokenRepository->save($data);
    }

    /**
     * Update personalAccessTokenRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $personalAccessTokenRepository = $this->personalAccessTokenRepository->update($data, $id);
            DB::commit();
            return $personalAccessTokenRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete personalAccessTokenRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $personalAccessTokenRepository = $this->personalAccessTokenRepository->delete($id);
            DB::commit();
            return $personalAccessTokenRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
