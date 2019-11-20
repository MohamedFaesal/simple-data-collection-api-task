<?php

namespace App\Http\Entities;

/**
 * User Class user entity
 * @package App\Http\Entities
 * @author Mohamed Faesal <mohamed.feasal@gmail.com>
 */
class User
{
    /**
     * @var int user id
     */
    public $id;

    /**
     * @var float user balance
     */
    public $balance;

    /**
     * @var string user email
     */
    public $email;

    /**
     * @var string currency that user use
     */
    public $currency;

    /**
     * @var string $status
     */
    public $status;

    /**
     * @var string date that user register at
     */
    public $registrationDate;
}