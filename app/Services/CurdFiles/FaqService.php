<?php
namespace App\Services;

use App\Models\Faq;
use App\Repositories\FaqRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class FaqService
{
	/**
     * @var FaqRepository $faqRepository
     */
    protected $faqRepository;

    /**
     * DummyClass constructor.
     *
     * @param FaqRepository $faqRepository
     */
    public function __construct(FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    /**
     * Get all faqRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->faqRepository->all();
    }

    /**
     * Get faqRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->faqRepository->getById($id);
    }

    /**
     * Validate faqRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->faqRepository->save($data);
    }

    /**
     * Update faqRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $faqRepository = $this->faqRepository->update($data, $id);
            DB::commit();
            return $faqRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete faqRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $faqRepository = $this->faqRepository->delete($id);
            DB::commit();
            return $faqRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
