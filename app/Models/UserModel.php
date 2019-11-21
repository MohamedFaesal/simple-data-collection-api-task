<?php

namespace App\Models;

use App\Http\Entities\User;
use App\Mappings\Interfaces\IMapping;
use Carbon\Carbon;

/**
 * UserModel Class a model to fetch user entities
 * @package App\Models
 * @author Mohamed Faesal <mohamed.feasal@gmail.com>
 */
class UserModel
{
    /**
     * get a list of users.
     * @param array $providers
     * @return array
     */
    public function getUsers(array $providers = []) : array
    {
        $users = [];
        $path = storage_path();
        foreach ($providers as $fileName => $mapper) {
            $providerData = json_decode(
                file_get_contents($path . "/data/" . $fileName . '.json' ),
                true
            );
            foreach ($providerData['users'] as $record) {
                $users[] = $this->mapToEntity($record, $mapper);
            }
        }
        return $users;
    }

    /**
     * map data to be shaped as an entity object
     * @param array $data data will be mapped
     * @param IMapping $providerMapping mapping schema will work based on it.
     * @return User
     */
    private function mapToEntity (array $data, IMapping $providerMapping) : User
    {
        $user = new User();
        $schema = $providerMapping->getMappingSchema();
        $user->id = strval($data[$schema['id']['key']]);
        $user->balance = floatval($data[$schema['balance']['key']]);
        $user->currency = strval($data[$schema['currency']['key']]);
        $user->email = strval($data[$schema['email']['key']]);
        $user->registrationDate = Carbon::parse(date('Y-m-d', strtotime($data[$schema['registrationDate']['key']]))) ;
        $user->status = $schema['status']['allowedValues'][$data[$schema['status']['key']]];
        return $user;
    }
}
