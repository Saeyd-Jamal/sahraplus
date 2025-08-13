<?php
namespace App\Repositories;

use App\Models\Page;

class PageRepository
{
	 /**
     * @var Page
     */
    protected Page $page;

    /**
     * Page constructor.
     *
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * Get all page.
     *
     * @return Page $page
     */
    public function all()
    {
        return $this->page->get();
    }

     /**
     * Get page by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->page->find($id);
    }

    /**
     * Save Page
     *
     * @param $data
     * @return Page
     */
     public function save(array $data)
    {
        return Page::create($data);
    }

     /**
     * Update Page
     *
     * @param $data
     * @return Page
     */
    public function update(array $data, int $id)
    {
        $page = $this->page->find($id);
        $page->update($data);
        return $page;
    }

    /**
     * Delete Page
     *
     * @param $data
     * @return Page
     */
   	 public function delete(int $id)
    {
        $page = $this->page->find($id);
        $page->delete();
        return $page;
    }
}
