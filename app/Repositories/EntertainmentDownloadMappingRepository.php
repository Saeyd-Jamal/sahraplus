<?php
namespace App\Repositories;

use App\Models\EntertainmentDownloadMapping;

class EntertainmentDownloadMappingRepository
{
	 /**
     * @var EntertainmentDownloadMapping
     */
    protected EntertainmentDownloadMapping $entertainmentDownloadMapping;

    /**
     * EntertainmentDownloadMapping constructor.
     *
     * @param EntertainmentDownloadMapping $entertainmentDownloadMapping
     */
    public function __construct(EntertainmentDownloadMapping $entertainmentDownloadMapping)
    {
        $this->entertainmentDownloadMapping = $entertainmentDownloadMapping;
    }

    /**
     * Get all entertainmentDownloadMapping.
     *
     * @return EntertainmentDownloadMapping $entertainmentDownloadMapping
     */
    public function all()
    {
        return $this->entertainmentDownloadMapping->get();
    }

     /**
     * Get entertainmentDownloadMapping by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->entertainmentDownloadMapping->find($id);
    }

    /**
     * Save EntertainmentDownloadMapping
     *
     * @param $data
     * @return EntertainmentDownloadMapping
     */
     public function save(array $data)
    {
        return EntertainmentDownloadMapping::create($data);
    }

     /**
     * Update EntertainmentDownloadMapping
     *
     * @param $data
     * @return EntertainmentDownloadMapping
     */
    public function update(array $data, int $id)
    {
        $entertainmentDownloadMapping = $this->entertainmentDownloadMapping->find($id);
        $entertainmentDownloadMapping->update($data);
        return $entertainmentDownloadMapping;
    }

    /**
     * Delete EntertainmentDownloadMapping
     *
     * @param $data
     * @return EntertainmentDownloadMapping
     */
   	 public function delete(int $id)
    {
        $entertainmentDownloadMapping = $this->entertainmentDownloadMapping->find($id);
        $entertainmentDownloadMapping->delete();
        return $entertainmentDownloadMapping;
    }
}
