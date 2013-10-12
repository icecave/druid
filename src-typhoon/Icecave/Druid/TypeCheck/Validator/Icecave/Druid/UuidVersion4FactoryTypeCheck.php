<?php
namespace Icecave\Druid\TypeCheck\Validator\Icecave\Druid;

class UuidVersion4FactoryTypeCheck extends \Icecave\Druid\TypeCheck\AbstractValidator
{
    public function validateConstruct(array $arguments)
    {
        $argumentCount = \count($arguments);
        if ($argumentCount > 1) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentException(1, $arguments[1]);
        }
    }

    public function create(array $arguments)
    {
        if (\count($arguments) > 0) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentException(0, $arguments[0]);
        }
    }

}
