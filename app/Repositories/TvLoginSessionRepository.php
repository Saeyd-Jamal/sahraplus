<?php
namespace App\Repositories;

use App\Models\TvLoginSession;

class TvLoginSessionRepository
{
	 /**
     * @var TvLoginSession
     */
    protected TvLoginSession $tvLoginSession;

    /**
     * TvLoginSession constructor.
     *
     * @param TvLoginSession $tvLoginSession
     */
    public function __construct(TvLoginSession $tvLoginSession)
    {
        $this->tvLoginSession = $tvLoginSession;
    }

    /**
     * Get all tvLoginSession.
     *
     * @return TvLoginSession $tvLoginSession
     */
    public function all()
    {
        return $this->tvLoginSession->get();
    }

     /**
     * Get tvLoginSession by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->tvLoginSession->find($id);
    }

    /**
     * Save TvLoginSession
     *
     * @param $data
     * @return TvLoginSession
     */
     public function save(array $data)
    {
        return TvLoginSession::create($data);
    }

     /**
     * Update TvLoginSession
     *
     * @param $data
     * @return TvLoginSession
     */
    public function update(array $data, int $id)
    {
        $tvLoginSession = $this->tvLoginSession->find($id);
        $tvLoginSession->update($data);
        return $tvLoginSession;
    }

    /**
     * Delete TvLoginSession
     *
     * @param $data
     * @return TvLoginSession
     */
   	 public function delete(int $id)
    {
        $tvLoginSession = $this->tvLoginSession->find($id);
        $tvLoginSession->delete();
        return $tvLoginSession;
    }
}
