<?php
namespace App\Repositories;

use App\Models\WebhookCall;

class WebhookCallRepository
{
	 /**
     * @var WebhookCall
     */
    protected WebhookCall $webhookCall;

    /**
     * WebhookCall constructor.
     *
     * @param WebhookCall $webhookCall
     */
    public function __construct(WebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
    }

    /**
     * Get all webhookCall.
     *
     * @return WebhookCall $webhookCall
     */
    public function all()
    {
        return $this->webhookCall->get();
    }

     /**
     * Get webhookCall by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->webhookCall->find($id);
    }

    /**
     * Save WebhookCall
     *
     * @param $data
     * @return WebhookCall
     */
     public function save(array $data)
    {
        return WebhookCall::create($data);
    }

     /**
     * Update WebhookCall
     *
     * @param $data
     * @return WebhookCall
     */
    public function update(array $data, int $id)
    {
        $webhookCall = $this->webhookCall->find($id);
        $webhookCall->update($data);
        return $webhookCall;
    }

    /**
     * Delete WebhookCall
     *
     * @param $data
     * @return WebhookCall
     */
   	 public function delete(int $id)
    {
        $webhookCall = $this->webhookCall->find($id);
        $webhookCall->delete();
        return $webhookCall;
    }
}
