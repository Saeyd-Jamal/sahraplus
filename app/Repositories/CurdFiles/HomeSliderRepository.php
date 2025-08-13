<?php
namespace App\Repositories;

use App\Models\HomeSlider;

class HomeSliderRepository
{
	 /**
     * @var HomeSlider
     */
    protected HomeSlider $homeSlider;

    /**
     * HomeSlider constructor.
     *
     * @param HomeSlider $homeSlider
     */
    public function __construct(HomeSlider $homeSlider)
    {
        $this->homeSlider = $homeSlider;
    }

    /**
     * Get all homeSlider.
     *
     * @return HomeSlider $homeSlider
     */
    public function all()
    {
        return $this->homeSlider->get();
    }

     /**
     * Get homeSlider by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->homeSlider->find($id);
    }

    /**
     * Save HomeSlider
     *
     * @param $data
     * @return HomeSlider
     */
     public function save(array $data)
    {
        return HomeSlider::create($data);
    }

     /**
     * Update HomeSlider
     *
     * @param $data
     * @return HomeSlider
     */
    public function update(array $data, int $id)
    {
        $homeSlider = $this->homeSlider->find($id);
        $homeSlider->update($data);
        return $homeSlider;
    }

    /**
     * Delete HomeSlider
     *
     * @param $data
     * @return HomeSlider
     */
   	 public function delete(int $id)
    {
        $homeSlider = $this->homeSlider->find($id);
        $homeSlider->delete();
        return $homeSlider;
    }
}
