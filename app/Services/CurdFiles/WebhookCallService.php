<?php
namespace App\Services;

use App\Models\WebhookCall;
use App\Repositories\WebhookCallRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class WebhookCallService
{
	/**
     * @var WebhookCallRepository $webhookCallRepository
     */
    protected $webhookCallRepository;

    /**
     * DummyClass constructor.
     *
     * @param WebhookCallRepository $webhookCallRepository
     */
    public function __construct(WebhookCallRepository $webhookCallRepository)
    {
        $this->webhookCallRepository = $webhookCallRepository;
    }

    /**
     * Get all webhookCallRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->webhookCallRepository->all();
    }

    /**
     * Get webhookCallRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->webhookCallRepository->getById($id);
    }

    /**
     * Validate webhookCallRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->webhookCallRepository->save($data);
    }

    /**
     * Update webhookCallRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $webhookCallRepository = $this->webhookCallRepository->update($data, $id);
            DB::commit();
            return $webhookCallRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete webhookCallRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $webhookCallRepository = $this->webhookCallRepository->delete($id);
            DB::commit();
            return $webhookCallRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
