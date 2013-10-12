<?php
namespace Icecave\Druid\TypeCheck;

class DummyValidator extends AbstractValidator
{
    public function __call($name, array $arguments)
    {
    }

}
