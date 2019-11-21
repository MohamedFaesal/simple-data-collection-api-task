<?php

namespace App\Repositories;

use App\Http\Entities\User;
use App\Mappings\XMapping;
use App\Mappings\YMapping;
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
        $providers = [
            'DataProviderX' => new XMapping(),
            'DataProviderY' => new YMapping(),
        ];
        if (isset($criteria['provider']) && isset($providers[$criteria['provider']])) {
            $providers = [$criteria['provider'] => $providers[$criteria['provider']]];
        }
        $users = $this->userModel->getUsers($providers);
        $filteredUsers = [];
        /**
         * @var User $user
         *
         */
        foreach ($users as $user) {
            if (isset($criteria['statusCode'])) {
                if ($criteria['statusCode'] != $user->status) {
                    continue;
                }
            }

            if (isset($criteria['currency'])) {
                if ($criteria['currency'] != $user->currency) {
                    continue;
                }
            }

            if (isset($criteria['balanceMin'])) {
                if (floatval($criteria['balanceMin']) > $user->balance) {
                    continue;
                }
            }

            if (isset($criteria['balanceMax'])) {
                if (floatval($criteria['balanceMax']) < $user->balance) {
                    continue;
                }
            }
            $filteredUsers[] = $user;
        }
        return $filteredUsers;
    }
}
