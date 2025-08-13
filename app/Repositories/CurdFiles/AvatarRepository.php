<?php
namespace App\Repositories;

use App\Models\Avatar;

class AvatarRepository
{
	 /**
     * @var Avatar
     */
    protected Avatar $avatar;

    /**
     * Avatar constructor.
     *
     * @param Avatar $avatar
     */
    public function __construct(Avatar $avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * Get all avatar.
     *
     * @return Avatar $avatar
     */
    public function all()
    {
        return $this->avatar->get();
    }

     /**
     * Get avatar by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->avatar->find($id);
    }

    /**
     * Save Avatar
     *
     * @param $data
     * @return Avatar
     */
     public function save(array $data)
    {
        return Avatar::create($data);
    }

     /**
     * Update Avatar
     *
     * @param $data
     * @return Avatar
     */
    public function update(array $data, int $id)
    {
        $avatar = $this->avatar->find($id);
        $avatar->update($data);
        return $avatar;
    }

    /**
     * Delete Avatar
     *
     * @param $data
     * @return Avatar
     */
   	 public function delete(int $id)
    {
        $avatar = $this->avatar->find($id);
        $avatar->delete();
        return $avatar;
    }
}
