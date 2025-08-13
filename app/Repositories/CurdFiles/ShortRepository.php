<?php
namespace App\Repositories;

use App\Models\Short;

class ShortRepository
{
	 /**
     * @var Short
     */
    protected Short $short;

    /**
     * Short constructor.
     *
     * @param Short $short
     */
    public function __construct(Short $short)
    {
        $this->short = $short;
    }

    /**
     * Get all short.
     *
     * @return Short $short
     */
    public function all()
    {
        return $this->short->get();
    }

     /**
     * Get short by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->short->find($id);
    }

    /**
     * Save Short
     *
     * @param $data
     * @return Short
     */
     public function save(array $data)
    {
        return Short::create($data);
    }

     /**
     * Update Short
     *
     * @param $data
     * @return Short
     */
    public function update(array $data, int $id)
    {
        $short = $this->short->find($id);
        $short->update($data);
        return $short;
    }

    /**
     * Delete Short
     *
     * @param $data
     * @return Short
     */
   	 public function delete(int $id)
    {
        $short = $this->short->find($id);
        $short->delete();
        return $short;
    }
}
