<?php
namespace App\Services;

use App\Models\Currency;
use App\Repositories\CurrencyRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class CurrencyService
{
	/**
     * @var CurrencyRepository $currencyRepository
     */
    protected $currencyRepository;

    /**
     * DummyClass constructor.
     *
     * @param CurrencyRepository $currencyRepository
     */
    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * Get all currencyRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->currencyRepository->all();
    }

    /**
     * Get currencyRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->currencyRepository->getById($id);
    }

    /**
     * Validate currencyRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->currencyRepository->save($data);
    }

    /**
     * Update currencyRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $currencyRepository = $this->currencyRepository->update($data, $id);
            DB::commit();
            return $currencyRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete currencyRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $currencyRepository = $this->currencyRepository->delete($id);
            DB::commit();
            return $currencyRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
