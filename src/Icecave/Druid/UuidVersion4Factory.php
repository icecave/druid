<?php
namespace Icecave\Druid;

use Icecave\Druid\TypeCheck\TypeCheck;
use Icecave\Isolator\Isolator;

class UuidVersion4Factory implements UuidFactoryInterface
{
    /**
     * @param Isolator|null $isolator
     */
    public function __construct(Isolator $isolator = null)
    {
        $this->typeCheck = TypeCheck::get(__CLASS__, func_get_args());

        $this->isolator = $isolator = Isolator::get($isolator);
    }

    /**
     * @return UuidInterface
     */
    public function create()
    {
        $this->typeCheck->create(func_get_args());

        return new Uuid(
            $this->isolator->mt_rand(0, Uuid::MASK16),
            $this->isolator->mt_rand(0, Uuid::MASK16),
            $this->isolator->mt_rand(0, Uuid::MASK16),
            $this->isolator->mt_rand(0, Uuid::MASK16)
                & static::GENERATOR_VERSION_MASK
                | (static::GENERATOR_VERSION_VALUE << static::VERSION_OFFSET),
            $this->isolator->mt_rand(0, Uuid::MASK8)
                & static::GENERATOR_RESERVED_MASK
                | static::GENERATOR_RESERVED_VALUE,
            $this->isolator->mt_rand(0, Uuid::MASK8),
            $this->isolator->mt_rand(0, Uuid::MASK16),
            $this->isolator->mt_rand(0, Uuid::MASK16),
            $this->isolator->mt_rand(0, Uuid::MASK16)
        );
    }

    /**
     * RFC-4122 section 4.4.
     *
     * {@link http://tools.ietf.org/html/rfc4122#section-4.4}
     */
    const GENERATOR_VERSION_MASK = 0x0fff;
    const GENERATOR_VERSION_VALUE = 4; // version 4
    const GENERATOR_RESERVED_MASK = 0x7f;
    const GENERATOR_RESERVED_VALUE = 0x80;

    const VERSION_OFFSET = 12;

    private $typeCheck;
    private $isolator;
}
