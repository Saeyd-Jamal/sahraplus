<?php
namespace App\Repositories;

use App\Models\ContinueWatch;

class ContinueWatchRepository
{
	 /**
     * @var ContinueWatch
     */
    protected ContinueWatch $continueWatch;

    /**
     * ContinueWatch constructor.
     *
     * @param ContinueWatch $continueWatch
     */
    public function __construct(ContinueWatch $continueWatch)
    {
        $this->continueWatch = $continueWatch;
    }

    /**
     * Get all continueWatch.
     *
     * @return ContinueWatch $continueWatch
     */
    public function all()
    {
        return $this->continueWatch->get();
    }

     /**
     * Get continueWatch by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->continueWatch->find($id);
    }

    /**
     * Save ContinueWatch
     *
     * @param $data
     * @return ContinueWatch
     */
     public function save(array $data)
    {
        return ContinueWatch::create($data);
    }

     /**
     * Update ContinueWatch
     *
     * @param $data
     * @return ContinueWatch
     */
    public function update(array $data, int $id)
    {
        $continueWatch = $this->continueWatch->find($id);
        $continueWatch->update($data);
        return $continueWatch;
    }

    /**
     * Delete ContinueWatch
     *
     * @param $data
     * @return ContinueWatch
     */
   	 public function delete(int $id)
    {
        $continueWatch = $this->continueWatch->find($id);
        $continueWatch->delete();
        return $continueWatch;
    }
}
