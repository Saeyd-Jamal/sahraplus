<?php
namespace App\Services;

use App\Models\Page;
use App\Repositories\PageRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class PageService
{
	/**
     * @var PageRepository $pageRepository
     */
    protected $pageRepository;

    /**
     * DummyClass constructor.
     *
     * @param PageRepository $pageRepository
     */
    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * Get all pageRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->pageRepository->all();
    }

    /**
     * Get pageRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->pageRepository->getById($id);
    }

    /**
     * Validate pageRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->pageRepository->save($data);
    }

    /**
     * Update pageRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $pageRepository = $this->pageRepository->update($data, $id);
            DB::commit();
            return $pageRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete pageRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $pageRepository = $this->pageRepository->delete($id);
            DB::commit();
            return $pageRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
