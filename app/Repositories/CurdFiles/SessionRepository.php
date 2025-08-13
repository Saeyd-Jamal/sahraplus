<?php
namespace App\Repositories;

use App\Models\Session;

class SessionRepository
{
	 /**
     * @var Session
     */
    protected Session $session;

    /**
     * Session constructor.
     *
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Get all session.
     *
     * @return Session $session
     */
    public function all()
    {
        return $this->session->get();
    }

     /**
     * Get session by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->session->find($id);
    }

    /**
     * Save Session
     *
     * @param $data
     * @return Session
     */
     public function save(array $data)
    {
        return Session::create($data);
    }

     /**
     * Update Session
     *
     * @param $data
     * @return Session
     */
    public function update(array $data, int $id)
    {
        $session = $this->session->find($id);
        $session->update($data);
        return $session;
    }

    /**
     * Delete Session
     *
     * @param $data
     * @return Session
     */
   	 public function delete(int $id)
    {
        $session = $this->session->find($id);
        $session->delete();
        return $session;
    }
}
