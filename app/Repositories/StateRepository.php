<?php
namespace App\Repositories;

use App\Models\State;

class StateRepository
{
	 /**
     * @var State
     */
    protected State $state;

    /**
     * State constructor.
     *
     * @param State $state
     */
    public function __construct(State $state)
    {
        $this->state = $state;
    }

    /**
     * Get all state.
     *
     * @return State $state
     */
    public function all()
    {
        return $this->state->get();
    }

     /**
     * Get state by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->state->find($id);
    }

    /**
     * Save State
     *
     * @param $data
     * @return State
     */
     public function save(array $data)
    {
        return State::create($data);
    }

     /**
     * Update State
     *
     * @param $data
     * @return State
     */
    public function update(array $data, int $id)
    {
        $state = $this->state->find($id);
        $state->update($data);
        return $state;
    }

    /**
     * Delete State
     *
     * @param $data
     * @return State
     */
   	 public function delete(int $id)
    {
        $state = $this->state->find($id);
        $state->delete();
        return $state;
    }
}
