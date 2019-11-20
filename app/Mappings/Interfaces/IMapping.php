<?php

namespace App\Mappings\Interfaces;

/**
 * IMapping Class an interface for all mapping providers
 * @package App\Mappings\Interfaces
 * @author Mohamed Faesal <mohamed.feasal@gmail.com>
 */
interface IMapping
{
    /**
     * retrieve mapping schema to map json data to user entity
     * @return mixed
     */
    public function getMappingSchema() : array ;
}
