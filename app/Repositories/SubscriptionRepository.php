<?php
namespace App\Repositories;

use App\Models\Subscription;

class SubscriptionRepository
{
	 /**
     * @var Subscription
     */
    protected Subscription $subscription;

    /**
     * Subscription constructor.
     *
     * @param Subscription $subscription
     */
    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * Get all subscription.
     *
     * @return Subscription $subscription
     */
    public function all()
    {
        return $this->subscription->get();
    }

     /**
     * Get subscription by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->subscription->find($id);
    }

    /**
     * Save Subscription
     *
     * @param $data
     * @return Subscription
     */
     public function save(array $data)
    {
        return Subscription::create($data);
    }

     /**
     * Update Subscription
     *
     * @param $data
     * @return Subscription
     */
    public function update(array $data, int $id)
    {
        $subscription = $this->subscription->find($id);
        $subscription->update($data);
        return $subscription;
    }

    /**
     * Delete Subscription
     *
     * @param $data
     * @return Subscription
     */
   	 public function delete(int $id)
    {
        $subscription = $this->subscription->find($id);
        $subscription->delete();
        return $subscription;
    }
}
