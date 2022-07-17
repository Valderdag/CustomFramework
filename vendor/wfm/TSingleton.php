<?php
namespace wfm;

trait TSingleton
{
    private static ?self $instance = null;

    private function __construct(){}

    /**
     * @return int|TSingleton|null
     */
    public static function getInstance(): static
    {
        return static::$instance ?? static::$instance = new static();
    }
}