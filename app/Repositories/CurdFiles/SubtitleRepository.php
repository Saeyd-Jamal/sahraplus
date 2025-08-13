<?php
namespace App\Repositories;

use App\Models\Subtitle;

class SubtitleRepository
{
	 /**
     * @var Subtitle
     */
    protected Subtitle $subtitle;

    /**
     * Subtitle constructor.
     *
     * @param Subtitle $subtitle
     */
    public function __construct(Subtitle $subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * Get all subtitle.
     *
     * @return Subtitle $subtitle
     */
    public function all()
    {
        return $this->subtitle->get();
    }

     /**
     * Get subtitle by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->subtitle->find($id);
    }

    /**
     * Save Subtitle
     *
     * @param $data
     * @return Subtitle
     */
     public function save(array $data)
    {
        return Subtitle::create($data);
    }

     /**
     * Update Subtitle
     *
     * @param $data
     * @return Subtitle
     */
    public function update(array $data, int $id)
    {
        $subtitle = $this->subtitle->find($id);
        $subtitle->update($data);
        return $subtitle;
    }

    /**
     * Delete Subtitle
     *
     * @param $data
     * @return Subtitle
     */
   	 public function delete(int $id)
    {
        $subtitle = $this->subtitle->find($id);
        $subtitle->delete();
        return $subtitle;
    }
}
