<?php
namespace App\Services;

use App\Models\Taxe;
use App\Repositories\TaxeRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class TaxeService
{
	/**
     * @var TaxeRepository $taxeRepository
     */
    protected $taxeRepository;

    /**
     * DummyClass constructor.
     *
     * @param TaxeRepository $taxeRepository
     */
    public function __construct(TaxeRepository $taxeRepository)
    {
        $this->taxeRepository = $taxeRepository;
    }

    /**
     * Get all taxeRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->taxeRepository->all();
    }

    /**
     * Get taxeRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->taxeRepository->getById($id);
    }

    /**
     * Validate taxeRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->taxeRepository->save($data);
    }

    /**
     * Update taxeRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $taxeRepository = $this->taxeRepository->update($data, $id);
            DB::commit();
            return $taxeRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete taxeRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $taxeRepository = $this->taxeRepository->delete($id);
            DB::commit();
            return $taxeRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
