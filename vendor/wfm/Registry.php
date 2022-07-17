<?php
namespace wfm;

class Registry
{
    use TSingleton;

    protected static array $properties = [];

    /**
     * @param array $properties
     */
    public function setProperty($name, $value)
    {
        self::$properties[$name] = $value;
    }

    /**
     * @return array
     */
    public function getProperty($name)
    {
        return self::$properties[$name] ?? null;
    }

    /**
     * @return array
     */
    public static function getProperties(): array
    {
        return self::$properties;
    }


}