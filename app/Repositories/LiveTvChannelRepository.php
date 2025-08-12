<?php
namespace App\Repositories;

use App\Models\LiveTvChannel;

class LiveTvChannelRepository
{
	 /**
     * @var LiveTvChannel
     */
    protected LiveTvChannel $liveTvChannel;

    /**
     * LiveTvChannel constructor.
     *
     * @param LiveTvChannel $liveTvChannel
     */
    public function __construct(LiveTvChannel $liveTvChannel)
    {
        $this->liveTvChannel = $liveTvChannel;
    }

    /**
     * Get all liveTvChannel.
     *
     * @return LiveTvChannel $liveTvChannel
     */
    public function all()
    {
        return $this->liveTvChannel->get();
    }

     /**
     * Get liveTvChannel by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->liveTvChannel->find($id);
    }

    /**
     * Save LiveTvChannel
     *
     * @param $data
     * @return LiveTvChannel
     */
     public function save(array $data)
    {
        return LiveTvChannel::create($data);
    }

     /**
     * Update LiveTvChannel
     *
     * @param $data
     * @return LiveTvChannel
     */
    public function update(array $data, int $id)
    {
        $liveTvChannel = $this->liveTvChannel->find($id);
        $liveTvChannel->update($data);
        return $liveTvChannel;
    }

    /**
     * Delete LiveTvChannel
     *
     * @param $data
     * @return LiveTvChannel
     */
   	 public function delete(int $id)
    {
        $liveTvChannel = $this->liveTvChannel->find($id);
        $liveTvChannel->delete();
        return $liveTvChannel;
    }
}
