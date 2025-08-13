<?php
namespace App\Repositories;

use App\Models\PersonalAccessToken;

class PersonalAccessTokenRepository
{
	 /**
     * @var PersonalAccessToken
     */
    protected PersonalAccessToken $personalAccessToken;

    /**
     * PersonalAccessToken constructor.
     *
     * @param PersonalAccessToken $personalAccessToken
     */
    public function __construct(PersonalAccessToken $personalAccessToken)
    {
        $this->personalAccessToken = $personalAccessToken;
    }

    /**
     * Get all personalAccessToken.
     *
     * @return PersonalAccessToken $personalAccessToken
     */
    public function all()
    {
        return $this->personalAccessToken->get();
    }

     /**
     * Get personalAccessToken by id
     *
     * @param $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->personalAccessToken->find($id);
    }

    /**
     * Save PersonalAccessToken
     *
     * @param $data
     * @return PersonalAccessToken
     */
     public function save(array $data)
    {
        return PersonalAccessToken::create($data);
    }

     /**
     * Update PersonalAccessToken
     *
     * @param $data
     * @return PersonalAccessToken
     */
    public function update(array $data, int $id)
    {
        $personalAccessToken = $this->personalAccessToken->find($id);
        $personalAccessToken->update($data);
        return $personalAccessToken;
    }

    /**
     * Delete PersonalAccessToken
     *
     * @param $data
     * @return PersonalAccessToken
     */
   	 public function delete(int $id)
    {
        $personalAccessToken = $this->personalAccessToken->find($id);
        $personalAccessToken->delete();
        return $personalAccessToken;
    }
}
