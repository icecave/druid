<?php
namespace Icecave\Druid;

interface UuidInterface
{
    /**
     * @return integer
     */
    public function timeLowHi();

    /**
     * @return integer
     */
    public function timeLowLow();

    /**
     * @return integer
     */
    public function timeMid();

    /**
     * @return integer
     */
    public function timeHi();

    /**
     * @return integer
     */
    public function clockSeqHi();

    /**
     * @return integer
     */
    public function clockSeqLow();

    /**
     * @return integer
     */
    public function nodeHi();

    /**
     * @return integer
     */
    public function nodeMid();

    /**
     * @return integer
     */
    public function nodeLow();

    /**
     * @return string
     */
    public function string();

    /**
     * @return string
     */
    public function bytes();
}
