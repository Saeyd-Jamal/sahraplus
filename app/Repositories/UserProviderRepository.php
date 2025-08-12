<?php
namespace App\Repositories;

use App\Models\UserProvider;

class UserProviderRepository
{
	 /**
     * @var UserProvider
     */
    protected UserProvider $userProvider;

    /**
     * UserProvider constructor.
     *
     * @param UserProvider $userProvider
     */
    public function __construct(UserProvider $userProvider)
    {
        $this->userProvider = $userProvider;
    }

    /**
     * Get all userProvider.
     *
     * @return UserProvider $userProvider
     */
    public function all()
    {
        return $this->userProvider->get();
    }

     /**
     * Get userProvider by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->userProvider->find($id);
    }

    /**
     * Save UserProvider
     *
     * @param $data
     * @return UserProvider
     */
     public function save(array $data)
    {
        return UserProvider::create($data);
    }

     /**
     * Update UserProvider
     *
     * @param $data
     * @return UserProvider
     */
    public function update(array $data, int $id)
    {
        $userProvider = $this->userProvider->find($id);
        $userProvider->update($data);
        return $userProvider;
    }

    /**
     * Delete UserProvider
     *
     * @param $data
     * @return UserProvider
     */
   	 public function delete(int $id)
    {
        $userProvider = $this->userProvider->find($id);
        $userProvider->delete();
        return $userProvider;
    }
}
