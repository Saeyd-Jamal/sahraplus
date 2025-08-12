<?php
namespace App\Repositories;

use App\Models\Banner;

class BannerRepository
{
	 /**
     * @var Banner
     */
    protected Banner $banner;

    /**
     * Banner constructor.
     *
     * @param Banner $banner
     */
    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    /**
     * Get all banner.
     *
     * @return Banner $banner
     */
    public function all()
    {
        return $this->banner->get();
    }

     /**
     * Get banner by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->banner->find($id);
    }

    /**
     * Save Banner
     *
     * @param $data
     * @return Banner
     */
     public function save(array $data)
    {
        return Banner::create($data);
    }

     /**
     * Update Banner
     *
     * @param $data
     * @return Banner
     */
    public function update(array $data, int $id)
    {
        $banner = $this->banner->find($id);
        $banner->update($data);
        return $banner;
    }

    /**
     * Delete Banner
     *
     * @param $data
     * @return Banner
     */
   	 public function delete(int $id)
    {
        $banner = $this->banner->find($id);
        $banner->delete();
        return $banner;
    }
}
