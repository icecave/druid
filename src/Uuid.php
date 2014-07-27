<?php
namespace Icecave\Druid;

use InvalidArgumentException;

/**
 * An RFC-4122 universally unique identifier (UUID).
 *
 * A UUID is a 16-byte (128-bit) number with the following fields:
 *
 *  0               1               2               3
 *  0 1 2 3 4 5 6 7 0 1 2 3 4 5 6 7 0 1 2 3 4 5 6 7 0 1 2 3 4 5 6 7
 * +-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
 * | time_low (32-bits)                                            |
 * +-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
 * | time_mid (16-bits)            | time_hi (16-bits)             |
 * +-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
 * | clk_seq_hi (8)| clk_seq_lo (8)|  node (48-bits)               |
 * +-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
 * | node (continued)                                              |
 * +-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
 *
 * @link http://tools.ietf.org/html/rfc4122
 */
class Uuid implements UuidInterface
{
    /**
     * @param integer $timeLowHi   The upper 16-bits of the RFC-4122 time_low field.
     * @param integer $timeLowLow  The lower 16-bits of the RFC-4122 time_low field.
     * @param integer $timeMid     The RFC-4122 time_mid field.
     * @param integer $timeHi      The RFC-4122 time_hi_and_version field.
     * @param integer $clockSeqHi  The RFC-4122 clock_seq_hi_and_reserved field.
     * @param integer $clockSeqLow The RFC-4122 clock_seq_low field.
     * @param integer $nodeHi      The upper 16-bits of the RFC-4122 node field.
     * @param integer $nodeMid     The middle 16-bits of the RFC-4122 node field.
     * @param integer $nodeLow     The lower 16-bits of the RFC-4122 node field.
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
     * The upper 16-bits of the RFC-4122 time_low field.
     *
     * @return integer The upper 16-bits of the RFC-4122 time_low field.
     */
    public function timeLowHi()
    {
        return $this->timeLowHi;
    }

    /**
     * The lower 16-bits of the RFC-4122 time_low field.
     *
     * @return integer The lower 16-bits of the RFC-4122 time_low field.
     */
    public function timeLowLow()
    {
        return $this->timeLowLow;
    }

    /**
     * The RFC-4122 time_mid field.
     *
     * @return integer The RFC-4122 time_mid field.
     */
    public function timeMid()
    {
        return $this->timeMid;
    }

    /**
     * The RFC-4122 time_hi_and_version field.
     *
     * @return integer The RFC-4122 time_hi_and_version field.
     */
    public function timeHi()
    {
        return $this->timeHi;
    }

    /**
     * The RFC-4122 clock_seq_hi_and_reserved field.
     *
     * @return integer The RFC-4122 clock_seq_hi_and_reserved field.
     */
    public function clockSeqHi()
    {
        return $this->clockSeqHi;
    }

    /**
     * The RFC-4122 clock_seq_low field.
     *
     * @return integer The RFC-4122 clock_seq_low field.
     */
    public function clockSeqLow()
    {
        return $this->clockSeqLow;
    }

    /**
     * The upper 16-bits of the RFC-4122 node field.
     *
     * @return integer The upper 16-bits of the RFC-4122 node field.
     */
    public function nodeHi()
    {
        return $this->nodeHi;
    }

    /**
     * The middle 16-bits of the RFC-4122 node field.
     *
     * @return integer The middle 16-bits of the RFC-4122 node field.
     */
    public function nodeMid()
    {
        return $this->nodeMid;
    }

    /**
     * The lower 16-bits of the RFC-4122 node field.
     *
     * @return integer The lower 16-bits of the RFC-4122 node field.
     */
    public function nodeLow()
    {
        return $this->nodeLow;
    }

    /**
     * Generate a string representation of this UUID.
     *
     * @return string A string representation of this UUID in the form xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx.
     */
    public function string()
    {
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
     * Get the raw binary representation of this UUID.
     *
     * @return string A 16-byte binary representation of this UUID.
     */
    public function bytes()
    {
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

    const STRING_FORMAT  = '%04x%04x-%04x-%04x-%02x%02x-%04x%04x%04x';
    const STRING_PATTERN = '/^([\da-f]{4})([\da-f]{4})-([\da-f]{4})-([\da-f]{4})-([\da-f]{2})([\da-f]{2})-([\da-f]{4})([\da-f]{4})([\da-f]{4})$/i';
    const MASK16         = 0xffff;
    const MASK8          = 0xff;

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
