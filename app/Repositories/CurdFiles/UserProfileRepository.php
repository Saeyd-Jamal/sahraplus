<?php
namespace App\Repositories;

use App\Models\UserProfile;

class UserProfileRepository
{
	 /**
     * @var UserProfile
     */
    protected UserProfile $userProfile;

    /**
     * UserProfile constructor.
     *
     * @param UserProfile $userProfile
     */
    public function __construct(UserProfile $userProfile)
    {
        $this->userProfile = $userProfile;
    }

    /**
     * Get all userProfile.
     *
     * @return UserProfile $userProfile
     */
    public function all()
    {
        return $this->userProfile->get();
    }

     /**
     * Get userProfile by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->userProfile->find($id);
    }

    /**
     * Save UserProfile
     *
     * @param $data
     * @return UserProfile
     */
     public function save(array $data)
    {
        return UserProfile::create($data);
    }

     /**
     * Update UserProfile
     *
     * @param $data
     * @return UserProfile
     */
    public function update(array $data, int $id)
    {
        $userProfile = $this->userProfile->find($id);
        $userProfile->update($data);
        return $userProfile;
    }

    /**
     * Delete UserProfile
     *
     * @param $data
     * @return UserProfile
     */
   	 public function delete(int $id)
    {
        $userProfile = $this->userProfile->find($id);
        $userProfile->delete();
        return $userProfile;
    }
}
