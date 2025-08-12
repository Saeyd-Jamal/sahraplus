<?php
namespace App\Repositories;

use App\Models\Language;

class LanguageRepository
{
	 /**
     * @var Language
     */
    protected Language $language;

    /**
     * Language constructor.
     *
     * @param Language $language
     */
    public function __construct(Language $language)
    {
        $this->language = $language;
    }

    /**
     * Get all language.
     *
     * @return Language $language
     */
    public function all()
    {
        return $this->language->get();
    }

     /**
     * Get language by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->language->find($id);
    }

    /**
     * Save Language
     *
     * @param $data
     * @return Language
     */
     public function save(array $data)
    {
        return Language::create($data);
    }

     /**
     * Update Language
     *
     * @param $data
     * @return Language
     */
    public function update(array $data, int $id)
    {
        $language = $this->language->find($id);
        $language->update($data);
        return $language;
    }

    /**
     * Delete Language
     *
     * @param $data
     * @return Language
     */
   	 public function delete(int $id)
    {
        $language = $this->language->find($id);
        $language->delete();
        return $language;
    }
}
