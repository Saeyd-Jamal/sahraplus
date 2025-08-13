<?php
namespace App\Repositories;

use App\Models\SliderItem;

class SliderItemRepository
{
	 /**
     * @var SliderItem
     */
    protected SliderItem $sliderItem;

    /**
     * SliderItem constructor.
     *
     * @param SliderItem $sliderItem
     */
    public function __construct(SliderItem $sliderItem)
    {
        $this->sliderItem = $sliderItem;
    }

    /**
     * Get all sliderItem.
     *
     * @return SliderItem $sliderItem
     */
    public function all()
    {
        return $this->sliderItem->get();
    }

     /**
     * Get sliderItem by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->sliderItem->find($id);
    }

    /**
     * Save SliderItem
     *
     * @param $data
     * @return SliderItem
     */
     public function save(array $data)
    {
        return SliderItem::create($data);
    }

     /**
     * Update SliderItem
     *
     * @param $data
     * @return SliderItem
     */
    public function update(array $data, int $id)
    {
        $sliderItem = $this->sliderItem->find($id);
        $sliderItem->update($data);
        return $sliderItem;
    }

    /**
     * Delete SliderItem
     *
     * @param $data
     * @return SliderItem
     */
   	 public function delete(int $id)
    {
        $sliderItem = $this->sliderItem->find($id);
        $sliderItem->delete();
        return $sliderItem;
    }
}
