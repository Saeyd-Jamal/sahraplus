<?php
namespace App\Repositories;

use App\Models\Currency;

class CurrencyRepository
{
	 /**
     * @var Currency
     */
    protected Currency $currency;

    /**
     * Currency constructor.
     *
     * @param Currency $currency
     */
    public function __construct(Currency $currency)
    {
        $this->currency = $currency;
    }

    /**
     * Get all currency.
     *
     * @return Currency $currency
     */
    public function all()
    {
        return $this->currency->get();
    }

     /**
     * Get currency by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->currency->find($id);
    }

    /**
     * Save Currency
     *
     * @param $data
     * @return Currency
     */
     public function save(array $data)
    {
        return Currency::create($data);
    }

     /**
     * Update Currency
     *
     * @param $data
     * @return Currency
     */
    public function update(array $data, int $id)
    {
        $currency = $this->currency->find($id);
        $currency->update($data);
        return $currency;
    }

    /**
     * Delete Currency
     *
     * @param $data
     * @return Currency
     */
   	 public function delete(int $id)
    {
        $currency = $this->currency->find($id);
        $currency->delete();
        return $currency;
    }
}
