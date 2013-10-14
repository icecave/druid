<?php
namespace Icecave\Druid;

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
interface UuidInterface
{
    /**
     * The upper 16-bits of the RFC-4122 time_low field.
     *
     * @return integer The upper 16-bits of the RFC-4122 time_low field.
     */
    public function timeLowHi();

    /**
     * The lower 16-bits of the RFC-4122 time_low field.
     *
     * @return integer The lower 16-bits of the RFC-4122 time_low field.
     */
    public function timeLowLow();

    /**
     * The RFC-4122 time_mid field.
     *
     * @return integer The RFC-4122 time_mid field.
     */
    public function timeMid();

    /**
     * The RFC-4122 time_hi_and_version field.
     *
     * @return integer The RFC-4122 time_hi_and_version field.
     */
    public function timeHi();

    /**
     * The RFC-4122 clock_seq_hi_and_reserved field.
     *
     * @return integer The RFC-4122 clock_seq_hi_and_reserved field.
     */
    public function clockSeqHi();

    /**
     * The RFC-4122 clock_seq_low field.
     *
     * @return integer The RFC-4122 clock_seq_low field.
     */
    public function clockSeqLow();

    /**
     * The upper 16-bits of the RFC-4122 node field.
     *
     * @return integer The upper 16-bits of the RFC-4122 node field.
     */
    public function nodeHi();

    /**
     * The middle 16-bits of the RFC-4122 node field.
     *
     * @return integer The middle 16-bits of the RFC-4122 node field.
     */
    public function nodeMid();

    /**
     * The lower 16-bits of the RFC-4122 node field.
     *
     * @return integer The lower 16-bits of the RFC-4122 node field.
     */
    public function nodeLow();

    /**
     * Generate a string representation of this UUID.
     *
     * @return string A string representation of this UUID in the form xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx.
     */
    public function string();

    /**
     * Get the raw binary representation of this UUID.
     *
     * @return string A 16-byte binary representation of this UUID.
     */
    public function bytes();
}
