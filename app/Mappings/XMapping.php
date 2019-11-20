<?php

namespace App\Mappings;

use App\Http\Utils\CodeStatusUtils;
use App\Mappings\Interfaces\IMapping;

/**
 * XMapping Class mapping x provider
 * @package App\Mappings
 * @author Mohamed Faesal <mohamed.feasal@gmail.com>
 */
class XMapping implements IMapping
{
    /**
     * {@inheritdoc}
     */
    public function getMappingSchema() : array {
        return [
            'id' => [
                'key' => 'parentIdentification'
            ],
            'balance' => [
                'key' => 'parentAmount'
            ],
            'currency' => [
                'key' => 'Currency'
            ],
            'email' => [
                'key' => 'parentEmail'
            ],
            'status' => [
                'key' => 'statusCode',
                'allowedValues' => [
                    1 => CodeStatusUtils::AUTHORIZED,
                    2 => CodeStatusUtils::DECLINED,
                    3 => CodeStatusUtils::REFUNDED
                ]
            ],
            'registrationDate' => [
                'key' => 'registrationDate',
                'format' => ''
            ],
        ];
    }
}
