<?php
namespace App\Repositories;

use App\Models\EntertainmentView;

class EntertainmentViewRepository
{
	 /**
     * @var EntertainmentView
     */
    protected EntertainmentView $entertainmentView;

    /**
     * EntertainmentView constructor.
     *
     * @param EntertainmentView $entertainmentView
     */
    public function __construct(EntertainmentView $entertainmentView)
    {
        $this->entertainmentView = $entertainmentView;
    }

    /**
     * Get all entertainmentView.
     *
     * @return EntertainmentView $entertainmentView
     */
    public function all()
    {
        return $this->entertainmentView->get();
    }

     /**
     * Get entertainmentView by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->entertainmentView->find($id);
    }

    /**
     * Save EntertainmentView
     *
     * @param $data
     * @return EntertainmentView
     */
     public function save(array $data)
    {
        return EntertainmentView::create($data);
    }

     /**
     * Update EntertainmentView
     *
     * @param $data
     * @return EntertainmentView
     */
    public function update(array $data, int $id)
    {
        $entertainmentView = $this->entertainmentView->find($id);
        $entertainmentView->update($data);
        return $entertainmentView;
    }

    /**
     * Delete EntertainmentView
     *
     * @param $data
     * @return EntertainmentView
     */
   	 public function delete(int $id)
    {
        $entertainmentView = $this->entertainmentView->find($id);
        $entertainmentView->delete();
        return $entertainmentView;
    }
}
