<?php
namespace App\Repositories;

use App\Models\UserReminder;

class UserReminderRepository
{
	 /**
     * @var UserReminder
     */
    protected UserReminder $userReminder;

    /**
     * UserReminder constructor.
     *
     * @param UserReminder $userReminder
     */
    public function __construct(UserReminder $userReminder)
    {
        $this->userReminder = $userReminder;
    }

    /**
     * Get all userReminder.
     *
     * @return UserReminder $userReminder
     */
    public function all()
    {
        return $this->userReminder->get();
    }

     /**
     * Get userReminder by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->userReminder->find($id);
    }

    /**
     * Save UserReminder
     *
     * @param $data
     * @return UserReminder
     */
     public function save(array $data)
    {
        return UserReminder::create($data);
    }

     /**
     * Update UserReminder
     *
     * @param $data
     * @return UserReminder
     */
    public function update(array $data, int $id)
    {
        $userReminder = $this->userReminder->find($id);
        $userReminder->update($data);
        return $userReminder;
    }

    /**
     * Delete UserReminder
     *
     * @param $data
     * @return UserReminder
     */
   	 public function delete(int $id)
    {
        $userReminder = $this->userReminder->find($id);
        $userReminder->delete();
        return $userReminder;
    }
}
