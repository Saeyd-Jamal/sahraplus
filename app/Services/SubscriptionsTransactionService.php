<?php
namespace App\Services;

use App\Models\SubscriptionsTransaction;
use App\Repositories\SubscriptionsTransactionRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class SubscriptionsTransactionService
{
	/**
     * @var SubscriptionsTransactionRepository $subscriptionsTransactionRepository
     */
    protected $subscriptionsTransactionRepository;

    /**
     * DummyClass constructor.
     *
     * @param SubscriptionsTransactionRepository $subscriptionsTransactionRepository
     */
    public function __construct(SubscriptionsTransactionRepository $subscriptionsTransactionRepository)
    {
        $this->subscriptionsTransactionRepository = $subscriptionsTransactionRepository;
    }

    /**
     * Get all subscriptionsTransactionRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->subscriptionsTransactionRepository->all();
    }

    /**
     * Get subscriptionsTransactionRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->subscriptionsTransactionRepository->getById($id);
    }

    /**
     * Validate subscriptionsTransactionRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->subscriptionsTransactionRepository->save($data);
    }

    /**
     * Update subscriptionsTransactionRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $subscriptionsTransactionRepository = $this->subscriptionsTransactionRepository->update($data, $id);
            DB::commit();
            return $subscriptionsTransactionRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete subscriptionsTransactionRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $subscriptionsTransactionRepository = $this->subscriptionsTransactionRepository->delete($id);
            DB::commit();
            return $subscriptionsTransactionRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
