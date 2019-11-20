<?php

namespace App\Mappings;

use App\Http\Utils\CodeStatusUtils;
use App\Mappings\Interfaces\IMapping;

/**
 * YMapping Class mapping y provider
 * @package App\Mappings
 * @author Mohamed Faesal <mohamed.feasal@gmail.com>
 */
class YMapping implements IMapping
{
    /**
     * {@inheritdoc}
     */
    public function getMappingSchema() : array {
        return [
            'id' => [
                'key' => 'id'
            ],
            'balance' => [
                'key' => 'balance'
            ],
            'currency' => [
                'key' => 'currency'
            ],
            'email' => [
                'key' => 'email'
            ],
            'status' => [
                'key' => 'status',
                'allowedValues' => [
                    100 => CodeStatusUtils::AUTHORIZED,
                    200 => CodeStatusUtils::DECLINED,
                    300 => CodeStatusUtils::REFUNDED
                ]
            ],
            'registrationDate' => [
                'key' => 'created_at',
            ],
        ];
    }
}
