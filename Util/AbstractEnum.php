<?php

namespace Payment\Util;

abstract class AbstractEnum
{
    /** @var array cache of all enum instances by class name and integer value */
    private static $allEnumMembers = array();

    /** @var mixed */
    private $code;

    /** @var string */
    private $description;

    /**
     * Return an enum instance of the concrete type on which this static method is called, assuming an instance
     * exists for the passed in value.  Otherwise an exception is thrown.
     *
     * @param $code
     * @return AbstractEnum
     * @throws Exception
     */
    public static function getByCode($code)
    {
        $concreteMembers = &self::getConcreteMembers();

        if (array_key_exists($code, $concreteMembers)) {
            return $concreteMembers[$code];
        }

        throw new Exception("Value '$code' does not exist for enum '".get_called_class()."'");
    }

    public static function getAllMembers()
    {
        return self::getConcreteMembers();
    }

    /**
     * Create, cache and return an instance of the concrete enum type for the supplied primitive value.
     *
     * @param mixed $code code to uniquely identify this enum
     * @param string $description
     * @throws Exception
     * @return AbstractEnum
     */
    protected static function enum($code, $description)
    {
        $concreteMembers = &self::getConcreteMembers();

        if (array_key_exists($code, $concreteMembers)) {
            throw new Exception("Value '$code' has already been added to enum '".get_called_class()."'");
        }

        $concreteMembers[$code] = $concreteEnumInstance = new static($code, $description);

        return $concreteEnumInstance;
    }

    /**
     * @return AbstractEnum[]
     */
    private static function &getConcreteMembers() {
        $thisClassName = get_called_class();

        if (!array_key_exists($thisClassName, self::$allEnumMembers)) {
            $concreteMembers = array();
            self::$allEnumMembers[$thisClassName] = $concreteMembers;
        }

        return self::$allEnumMembers[$thisClassName];
    }

    private function __construct($code, $description)
    {
        $this->code = $code;
        $this->description = $description;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getDescription()
    {
        return $this->description;
    }
}