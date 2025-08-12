<?php
namespace App\Repositories;

use App\Models\UserMultiProfile;

class UserMultiProfileRepository
{
	 /**
     * @var UserMultiProfile
     */
    protected UserMultiProfile $userMultiProfile;

    /**
     * UserMultiProfile constructor.
     *
     * @param UserMultiProfile $userMultiProfile
     */
    public function __construct(UserMultiProfile $userMultiProfile)
    {
        $this->userMultiProfile = $userMultiProfile;
    }

    /**
     * Get all userMultiProfile.
     *
     * @return UserMultiProfile $userMultiProfile
     */
    public function all()
    {
        return $this->userMultiProfile->get();
    }

     /**
     * Get userMultiProfile by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->userMultiProfile->find($id);
    }

    /**
     * Save UserMultiProfile
     *
     * @param $data
     * @return UserMultiProfile
     */
     public function save(array $data)
    {
        return UserMultiProfile::create($data);
    }

     /**
     * Update UserMultiProfile
     *
     * @param $data
     * @return UserMultiProfile
     */
    public function update(array $data, int $id)
    {
        $userMultiProfile = $this->userMultiProfile->find($id);
        $userMultiProfile->update($data);
        return $userMultiProfile;
    }

    /**
     * Delete UserMultiProfile
     *
     * @param $data
     * @return UserMultiProfile
     */
   	 public function delete(int $id)
    {
        $userMultiProfile = $this->userMultiProfile->find($id);
        $userMultiProfile->delete();
        return $userMultiProfile;
    }
}
