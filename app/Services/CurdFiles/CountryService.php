<?php
namespace App\Services;

use App\Models\Country;
use App\Repositories\CountryRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class CountryService
{
	/**
     * @var CountryRepository $countryRepository
     */
    protected $countryRepository;

    /**
     * DummyClass constructor.
     *
     * @param CountryRepository $countryRepository
     */
    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * Get all countryRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->countryRepository->all();
    }

    /**
     * Get countryRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->countryRepository->getById($id);
    }

    /**
     * Validate countryRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->countryRepository->save($data);
    }

    /**
     * Update countryRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $countryRepository = $this->countryRepository->update($data, $id);
            DB::commit();
            return $countryRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete countryRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $countryRepository = $this->countryRepository->delete($id);
            DB::commit();
            return $countryRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
