<?php
namespace App\Repositories;

use App\Models\World;

class WorldRepository
{
	 /**
     * @var World
     */
    protected World $world;

    /**
     * World constructor.
     *
     * @param World $world
     */
    public function __construct(World $world)
    {
        $this->world = $world;
    }

    /**
     * Get all world.
     *
     * @return World $world
     */
    public function all()
    {
        return $this->world->get();
    }

     /**
     * Get world by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->world->find($id);
    }

    /**
     * Save World
     *
     * @param $data
     * @return World
     */
     public function save(array $data)
    {
        return World::create($data);
    }

     /**
     * Update World
     *
     * @param $data
     * @return World
     */
    public function update(array $data, int $id)
    {
        $world = $this->world->find($id);
        $world->update($data);
        return $world;
    }

    /**
     * Delete World
     *
     * @param $data
     * @return World
     */
   	 public function delete(int $id)
    {
        $world = $this->world->find($id);
        $world->delete();
        return $world;
    }
}
