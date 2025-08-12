<?php
namespace App\Repositories;

use App\Models\EntertainmentDownload;

class EntertainmentDownloadRepository
{
	 /**
     * @var EntertainmentDownload
     */
    protected EntertainmentDownload $entertainmentDownload;

    /**
     * EntertainmentDownload constructor.
     *
     * @param EntertainmentDownload $entertainmentDownload
     */
    public function __construct(EntertainmentDownload $entertainmentDownload)
    {
        $this->entertainmentDownload = $entertainmentDownload;
    }

    /**
     * Get all entertainmentDownload.
     *
     * @return EntertainmentDownload $entertainmentDownload
     */
    public function all()
    {
        return $this->entertainmentDownload->get();
    }

     /**
     * Get entertainmentDownload by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->entertainmentDownload->find($id);
    }

    /**
     * Save EntertainmentDownload
     *
     * @param $data
     * @return EntertainmentDownload
     */
     public function save(array $data)
    {
        return EntertainmentDownload::create($data);
    }

     /**
     * Update EntertainmentDownload
     *
     * @param $data
     * @return EntertainmentDownload
     */
    public function update(array $data, int $id)
    {
        $entertainmentDownload = $this->entertainmentDownload->find($id);
        $entertainmentDownload->update($data);
        return $entertainmentDownload;
    }

    /**
     * Delete EntertainmentDownload
     *
     * @param $data
     * @return EntertainmentDownload
     */
   	 public function delete(int $id)
    {
        $entertainmentDownload = $this->entertainmentDownload->find($id);
        $entertainmentDownload->delete();
        return $entertainmentDownload;
    }
}
