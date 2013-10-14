<?php
namespace Icecave\Druid\TypeCheck\Validator\Icecave\Druid;

class UuidTypeCheck extends \Icecave\Druid\TypeCheck\AbstractValidator
{
    public function validateConstruct(array $arguments)
    {
        $argumentCount = \count($arguments);
        if ($argumentCount < 9) {
            if ($argumentCount < 1) {
                throw new \Icecave\Druid\TypeCheck\Exception\MissingArgumentException('timeLowHi', 0, 'integer');
            }
            if ($argumentCount < 2) {
                throw new \Icecave\Druid\TypeCheck\Exception\MissingArgumentException('timeLowLow', 1, 'integer');
            }
            if ($argumentCount < 3) {
                throw new \Icecave\Druid\TypeCheck\Exception\MissingArgumentException('timeMid', 2, 'integer');
            }
            if ($argumentCount < 4) {
                throw new \Icecave\Druid\TypeCheck\Exception\MissingArgumentException('timeHi', 3, 'integer');
            }
            if ($argumentCount < 5) {
                throw new \Icecave\Druid\TypeCheck\Exception\MissingArgumentException('clockSeqHi', 4, 'integer');
            }
            if ($argumentCount < 6) {
                throw new \Icecave\Druid\TypeCheck\Exception\MissingArgumentException('clockSeqLow', 5, 'integer');
            }
            if ($argumentCount < 7) {
                throw new \Icecave\Druid\TypeCheck\Exception\MissingArgumentException('nodeHi', 6, 'integer');
            }
            if ($argumentCount < 8) {
                throw new \Icecave\Druid\TypeCheck\Exception\MissingArgumentException('nodeMid', 7, 'integer');
            }
            throw new \Icecave\Druid\TypeCheck\Exception\MissingArgumentException('nodeLow', 8, 'integer');
        } elseif ($argumentCount > 9) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentException(9, $arguments[9]);
        }
        $value = $arguments[0];
        if (!\is_int($value)) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentValueException(
                'timeLowHi',
                0,
                $arguments[0],
                'integer'
            );
        }
        $value = $arguments[1];
        if (!\is_int($value)) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentValueException(
                'timeLowLow',
                1,
                $arguments[1],
                'integer'
            );
        }
        $value = $arguments[2];
        if (!\is_int($value)) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentValueException(
                'timeMid',
                2,
                $arguments[2],
                'integer'
            );
        }
        $value = $arguments[3];
        if (!\is_int($value)) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentValueException(
                'timeHi',
                3,
                $arguments[3],
                'integer'
            );
        }
        $value = $arguments[4];
        if (!\is_int($value)) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentValueException(
                'clockSeqHi',
                4,
                $arguments[4],
                'integer'
            );
        }
        $value = $arguments[5];
        if (!\is_int($value)) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentValueException(
                'clockSeqLow',
                5,
                $arguments[5],
                'integer'
            );
        }
        $value = $arguments[6];
        if (!\is_int($value)) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentValueException(
                'nodeHi',
                6,
                $arguments[6],
                'integer'
            );
        }
        $value = $arguments[7];
        if (!\is_int($value)) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentValueException(
                'nodeMid',
                7,
                $arguments[7],
                'integer'
            );
        }
        $value = $arguments[8];
        if (!\is_int($value)) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentValueException(
                'nodeLow',
                8,
                $arguments[8],
                'integer'
            );
        }
    }

    public function fromString(array $arguments)
    {
        $argumentCount = \count($arguments);
        if ($argumentCount < 1) {
            throw new \Icecave\Druid\TypeCheck\Exception\MissingArgumentException('string', 0, 'string');
        } elseif ($argumentCount > 1) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentException(1, $arguments[1]);
        }
        $value = $arguments[0];
        if (!\is_string($value)) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentValueException(
                'string',
                0,
                $arguments[0],
                'string'
            );
        }
    }

    public function fromBytes(array $arguments)
    {
        $argumentCount = \count($arguments);
        if ($argumentCount < 1) {
            throw new \Icecave\Druid\TypeCheck\Exception\MissingArgumentException('bytes', 0, 'string');
        } elseif ($argumentCount > 1) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentException(1, $arguments[1]);
        }
        $value = $arguments[0];
        if (!\is_string($value)) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentValueException(
                'bytes',
                0,
                $arguments[0],
                'string'
            );
        }
    }

    public function timeLowHi(array $arguments)
    {
        if (\count($arguments) > 0) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentException(0, $arguments[0]);
        }
    }

    public function timeLowLow(array $arguments)
    {
        if (\count($arguments) > 0) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentException(0, $arguments[0]);
        }
    }

    public function timeMid(array $arguments)
    {
        if (\count($arguments) > 0) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentException(0, $arguments[0]);
        }
    }

    public function timeHi(array $arguments)
    {
        if (\count($arguments) > 0) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentException(0, $arguments[0]);
        }
    }

    public function clockSeqHi(array $arguments)
    {
        if (\count($arguments) > 0) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentException(0, $arguments[0]);
        }
    }

    public function clockSeqLow(array $arguments)
    {
        if (\count($arguments) > 0) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentException(0, $arguments[0]);
        }
    }

    public function nodeHi(array $arguments)
    {
        if (\count($arguments) > 0) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentException(0, $arguments[0]);
        }
    }

    public function nodeMid(array $arguments)
    {
        if (\count($arguments) > 0) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentException(0, $arguments[0]);
        }
    }

    public function nodeLow(array $arguments)
    {
        if (\count($arguments) > 0) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentException(0, $arguments[0]);
        }
    }

    public function string(array $arguments)
    {
        if (\count($arguments) > 0) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentException(0, $arguments[0]);
        }
    }

    public function bytes(array $arguments)
    {
        if (\count($arguments) > 0) {
            throw new \Icecave\Druid\TypeCheck\Exception\UnexpectedArgumentException(0, $arguments[0]);
        }
    }

}
