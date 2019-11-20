<?php

namespace App\Repositories;

use App\Http\Entities\User;
use App\Models\UserModel;

/**
 * UserRepository Class a repository to fetch & search user entities
 * @package App\Repositories
 * @author Mohamed Faesal <mohamed.feasal@gmail.com>
 */
class UserRepository
{
    /**
     * @var UserModel user model
     */
    public $userModel;

    /**
     * UserRepository constructor.
     * @param UserModel $userModel
     */
    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * get a list of users by criteria
     * @param array $criteria search criteria
     * @return array
     * @see User
     */
    public function getUsersByCriteria(array $criteria = []) : array
    {
        $users = $this->userModel->getUsers();
    }
}
