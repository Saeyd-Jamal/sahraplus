<?php
namespace App\Repositories;

use App\Models\Faq;

class FaqRepository
{
	 /**
     * @var Faq
     */
    protected Faq $faq;

    /**
     * Faq constructor.
     *
     * @param Faq $faq
     */
    public function __construct(Faq $faq)
    {
        $this->faq = $faq;
    }

    /**
     * Get all faq.
     *
     * @return Faq $faq
     */
    public function all()
    {
        return $this->faq->get();
    }

     /**
     * Get faq by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->faq->find($id);
    }

    /**
     * Save Faq
     *
     * @param $data
     * @return Faq
     */
     public function save(array $data)
    {
        return Faq::create($data);
    }

     /**
     * Update Faq
     *
     * @param $data
     * @return Faq
     */
    public function update(array $data, int $id)
    {
        $faq = $this->faq->find($id);
        $faq->update($data);
        return $faq;
    }

    /**
     * Delete Faq
     *
     * @param $data
     * @return Faq
     */
   	 public function delete(int $id)
    {
        $faq = $this->faq->find($id);
        $faq->delete();
        return $faq;
    }
}
