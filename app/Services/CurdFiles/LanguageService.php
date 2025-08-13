<?php
namespace App\Services;

use App\Models\Language;
use App\Repositories\LanguageRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class LanguageService
{
	/**
     * @var LanguageRepository $languageRepository
     */
    protected $languageRepository;

    /**
     * DummyClass constructor.
     *
     * @param LanguageRepository $languageRepository
     */
    public function __construct(LanguageRepository $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    /**
     * Get all languageRepository.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->languageRepository->all();
    }

    /**
     * Get languageRepository by id.
     *
     * @param $id
     * @return String
     */
    public function getById(int $id)
    {
        return $this->languageRepository->getById($id);
    }

    /**
     * Validate languageRepository data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save(array $data)
    {
        return $this->languageRepository->save($data);
    }

    /**
     * Update languageRepository data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function update(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            $languageRepository = $this->languageRepository->update($data, $id);
            DB::commit();
            return $languageRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to update post data');
        }
    }

    /**
     * Delete languageRepository by id.
     *
     * @param $id
     * @return String
     */
    public function deleteById(int $id)
    {
        DB::beginTransaction();
        try {
            $languageRepository = $this->languageRepository->delete($id);
            DB::commit();
            return $languageRepository;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            throw new InvalidArgumentException('Unable to delete post data');
        }
    }

}
