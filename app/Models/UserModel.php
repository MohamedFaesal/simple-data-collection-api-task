<?php

namespace App\Models;

use App\Http\Entities\User;
use App\Mappings\Interfaces\IMapping;
use App\Mappings\XMapping;

/**
 * UserModel Class a model to fetch user entities
 * @package App\Models
 * @author Mohamed Faesal <mohamed.feasal@gmail.com>
 */
class UserModel
{
    /**
     * get a list of users.
     * @return array
     */
    public function getUsers() : array
    {
        $users = [];
        $path = storage_path();
        $providers = [
            'x.json' => new XMapping(),
        ];
        foreach ($providers as $fileName => $mapper) {
            $providerData = json_decode(
                file_get_contents($path . "\data\\" . $fileName ),
                true
            );
            dd($providerData);
        }
        return $users;
    }

    private function mapToEntity (array $data, IMapping $providerMapping) : User
    {
        $user = new User();

    }
}
