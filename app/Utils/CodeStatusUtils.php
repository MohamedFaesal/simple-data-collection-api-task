<?php

namespace App\Http\Utils;

/**
 * User Class user entity
 * @package App\Http\Utils
 * @author Mohamed Faesal <mohamed.feasal@gmail.com>
 */
class CodeStatusUtils
{
    /**
     * @const AUTHORIZED authorized status
     */
    const AUTHORIZED = 'authorised';

    /**
     * @const DECLINED declined status
     */
    const DECLINED  = 'decline';

    /**
     * @const REFUNDED refunded status
     */
    const REFUNDED  = 'refunded';
}