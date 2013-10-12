<?php
namespace Icecave\Druid;

use Icecave\Druid\TypeCheck\TypeCheck;
use InvalidArgumentException;

class Uuid implements UuidInterface
{
    /**
     * @param integer $timeLowHi
     * @param integer $timeLowLow
     * @param integer $timeMid
     * @param integer $timeHi
     * @param integer $clockSeqHi
     * @param integer $clockSeqLow
     * @param integer $nodeHi
     * @param integer $nodeMid
     * @param integer $nodeLow
     */
    public function __construct(
        $timeLowHi,
        $timeLowLow,
        $timeMid,
        $timeHi,
        $clockSeqHi,
        $clockSeqLow,
        $nodeHi,
        $nodeMid,
        $nodeLow
    ) {
        $this->typeCheck = TypeCheck::get(__CLASS__, func_get_args());

        $this->timeLowHi = $timeLowHi & static::MASK16;
        $this->timeLowLow = $timeLowLow & static::MASK16;
        $this->timeMid = $timeMid & static::MASK16;
        $this->timeHi = $timeHi & static::MASK16;
        $this->clockSeqHi = $clockSeqHi & static::MASK8;
        $this->clockSeqLow = $clockSeqLow & static::MASK8;
        $this->nodeHi = $nodeHi & static::MASK16;
        $this->nodeMid = $nodeMid & static::MASK16;
        $this->nodeLow = $nodeLow & static::MASK16;
    }

    /**
     * @param string $string
     *
     * @return Uuid
     * @throws InvalidArgumentException
     */
    public static function fromString($string)
    {
        TypeCheck::get(__CLASS__)->fromString(func_get_args());

        $result = array();
        if (!preg_match(self::STRING_PATTERN, $string, $result)) {
            throw new InvalidArgumentException('Invalid UUID.');
        }

        return new static(
            hexdec($result[1]),
            hexdec($result[2]),
            hexdec($result[3]),
            hexdec($result[4]),
            hexdec($result[5]),
            hexdec($result[6]),
            hexdec($result[7]),
            hexdec($result[8]),
            hexdec($result[9])
        );
    }

    /**
     * @param string $bytes
     *
     * @return Uuid
     * @throws InvalidArgumentException
     */
    public static function fromBytes($bytes)
    {
        TypeCheck::get(__CLASS__)->fromBytes(func_get_args());

        if (16 !== strlen($bytes)) {
            throw new InvalidArgumentException('Invalid UUID.');
        }

        $result = unpack('n*', $bytes);

        return new static(
            $result[1],
            $result[2],
            $result[3],
            $result[4],
            $result[5] >> 8,
            $result[5],
            $result[6],
            $result[7],
            $result[8]
        );
    }

    /**
     * @return integer
     */
    public function timeLowHi()
    {
        $this->typeCheck->timeLowHi(func_get_args());

        return $this->timeLowHi;
    }

    /**
     * @return integer
     */
    public function timeLowLow()
    {
        $this->typeCheck->timeLowLow(func_get_args());

        return $this->timeLowLow;
    }

    /**
     * @return integer
     */
    public function timeMid()
    {
        $this->typeCheck->timeMid(func_get_args());

        return $this->timeMid;
    }

    /**
     * @return integer
     */
    public function timeHi()
    {
        $this->typeCheck->timeHi(func_get_args());

        return $this->timeHi;
    }

    /**
     * @return integer
     */
    public function clockSeqHi()
    {
        $this->typeCheck->clockSeqHi(func_get_args());

        return $this->clockSeqHi;
    }

    /**
     * @return integer
     */
    public function clockSeqLow()
    {
        $this->typeCheck->clockSeqLow(func_get_args());

        return $this->clockSeqLow;
    }

    /**
     * @return integer
     */
    public function nodeHi()
    {
        $this->typeCheck->nodeHi(func_get_args());

        return $this->nodeHi;
    }

    /**
     * @return integer
     */
    public function nodeMid()
    {
        $this->typeCheck->nodeMid(func_get_args());

        return $this->nodeMid;
    }

    /**
     * @return integer
     */
    public function nodeLow()
    {
        $this->typeCheck->nodeLow(func_get_args());

        return $this->nodeLow;
    }

    /**
     * @return string
     */
    public function string()
    {
        $this->typeCheck->string(func_get_args());

        return sprintf(
            static::STRING_FORMAT,
            $this->timeLowHi(),
            $this->timeLowLow(),
            $this->timeMid(),
            $this->timeHi(),
            $this->clockSeqHi(),
            $this->clockSeqLow(),
            $this->nodeHi(),
            $this->nodeMid(),
            $this->nodeLow()
        );
    }

    /**
     * @return string
     */
    public function bytes()
    {
        $this->typeCheck->bytes(func_get_args());

        return pack(
            'n*',
            $this->timeLowHi(),
            $this->timeLowLow(),
            $this->timeMid(),
            $this->timeHi(),
            $this->clockSeqHi() << 8 | $this->clockSeqLow(),
            $this->nodeHi(),
            $this->nodeMid(),
            $this->nodeLow()
        );
    }

    const STRING_FORMAT = '%04x%04x-%04x-%04x-%02x%02x-%04x%04x%04x';
    const STRING_PATTERN = '/^([\da-f]{4})([\da-f]{4})-([\da-f]{4})-([\da-f]{4})-([\da-f]{2})([\da-f]{2})-([\da-f]{4})([\da-f]{4})([\da-f]{4})$/i';
    const MASK16 = 0xffff;
    const MASK8  = 0xff;

    private $typeCheck;
    private $timeLowHi;
    private $timeLowLow;
    private $timeMid;
    private $timeHi;
    private $clockSeqHi;
    private $clockSeqLow;
    private $nodeHi;
    private $nodeMid;
    private $nodeLow;
}
