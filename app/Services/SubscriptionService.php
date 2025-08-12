<?php
namespace App\Services;

use App\Models\Subscription;
use App\Repositories\SubscriptionRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class SubscriptionService
{
	/**
     * @var SubscriptionRepository $subscriptionRepository
     */
    protected $subscriptionRepository;

    /**
     * DummyClass constructor.
     *
     * @param SubscriptionRepository $subscriptionRepository
     */
    public function __construct(SubscriptionRepository $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    /**
     * Get all subscriptionRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->subscriptionRepository->all();
    }

    /**
     * Get subscriptionRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->subscriptionRepository->getById($id);
    }

    /**
     * Validate subscriptionRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->subscriptionRepository->save($data);
    }

    /**
     * Update subscriptionRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $subscriptionRepository = $this->subscriptionRepository->update($data, $id);
            DB::commit();
            return $subscriptionRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete subscriptionRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $subscriptionRepository = $this->subscriptionRepository->delete($id);
            DB::commit();
            return $subscriptionRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
