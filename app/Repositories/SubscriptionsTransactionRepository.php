<?php
namespace App\Repositories;

use App\Models\SubscriptionsTransaction;

class SubscriptionsTransactionRepository
{
	 /**
     * @var SubscriptionsTransaction
     */
    protected SubscriptionsTransaction $subscriptionsTransaction;

    /**
     * SubscriptionsTransaction constructor.
     *
     * @param SubscriptionsTransaction $subscriptionsTransaction
     */
    public function __construct(SubscriptionsTransaction $subscriptionsTransaction)
    {
        $this->subscriptionsTransaction = $subscriptionsTransaction;
    }

    /**
     * Get all subscriptionsTransaction.
     *
     * @return SubscriptionsTransaction $subscriptionsTransaction
     */
    public function all()
    {
        return $this->subscriptionsTransaction->get();
    }

     /**
     * Get subscriptionsTransaction by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->subscriptionsTransaction->find($id);
    }

    /**
     * Save SubscriptionsTransaction
     *
     * @param $data
     * @return SubscriptionsTransaction
     */
     public function save(array $data)
    {
        return SubscriptionsTransaction::create($data);
    }

     /**
     * Update SubscriptionsTransaction
     *
     * @param $data
     * @return SubscriptionsTransaction
     */
    public function update(array $data, int $id)
    {
        $subscriptionsTransaction = $this->subscriptionsTransaction->find($id);
        $subscriptionsTransaction->update($data);
        return $subscriptionsTransaction;
    }

    /**
     * Delete SubscriptionsTransaction
     *
     * @param $data
     * @return SubscriptionsTransaction
     */
   	 public function delete(int $id)
    {
        $subscriptionsTransaction = $this->subscriptionsTransaction->find($id);
        $subscriptionsTransaction->delete();
        return $subscriptionsTransaction;
    }
}
