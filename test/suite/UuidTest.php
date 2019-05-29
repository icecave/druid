<?php
namespace Icecave\Druid;

use PHPUnit_Framework_TestCase;

class UuidTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        // Construct with bits set outside expected ranges to ensure they're stripped.
        $this->uuid = new Uuid(
            0x0123 | 0xffff0000,
            0x4567 | 0xffff0000,
            0x89AB | 0xffff0000,
            0xCDEF | 0xffff0000,
            0xFE   | 0xffffff00,
            0xDC   | 0xffffff00,
            0xBA98 | 0xffff0000,
            0x7654 | 0xffff0000,
            0x3210 | 0xffff0000
        );
    }

    public function testFromString()
    {
        $uuid = Uuid::fromString('01234567-89AB-CDEF-FEDC-BA9876543210');

        $this->assertEquals($this->uuid, $uuid);
    }

    public function testFromStringFailureTooShort()
    {
        $this->setExpectedException('InvalidArgumentException', 'Invalid UUID.');
        Uuid::fromString('01234567');
    }

    public function testFromStringFailureTooLong()
    {
        $this->setExpectedException('InvalidArgumentException', 'Invalid UUID.');
        Uuid::fromString('01234567-89AB-CDEF-FEDC-BA9876-543210');
    }

    public function testFromBytes()
    {
        $uuid = Uuid::fromBytes("\x01\x23\x45\x67\x89\xab\xcd\xef\xfe\xdc\xba\x98\x76\x54\x32\x10");

        $this->assertEquals($this->uuid, $uuid);
    }

    public function testFromBytesFailureTooShort()
    {
        $this->setExpectedException('InvalidArgumentException', 'Invalid UUID.');
        Uuid::fromBytes("\x01\x23");
    }

    public function testFromBytesFailureTooLong()
    {
        $this->setExpectedException('InvalidArgumentException', 'Invalid UUID.');
        Uuid::fromBytes("\x01\x23\x45\x67\x89\x00\x00\xab\xcd\xef\xfe\xdc\xba\x98\x76\x54\x32\x10");
    }

    public function testTimeLowHi()
    {
        $this->assertSame(0x0123, $this->uuid->timeLowHi());
    }

    public function testTimeLowLow()
    {
        $this->assertSame(0x4567, $this->uuid->timeLowLow());
    }

    public function testTimeMid()
    {
        $this->assertSame(0x89AB, $this->uuid->timeMid());
    }

    public function testTimeHi()
    {
        $this->assertSame(0xCDEF, $this->uuid->timeHi());
    }

    public function testClockSeqHi()
    {
        $this->assertSame(0xFE, $this->uuid->clockSeqHi());
    }

    public function testClockSeqLow()
    {
        $this->assertSame(0xDC, $this->uuid->clockSeqLow());
    }

    public function testNodeHi()
    {
        $this->assertSame(0xBA98, $this->uuid->nodeHi());
    }

    public function testNodeMid()
    {
        $this->assertSame(0x7654, $this->uuid->nodeMid());
    }

    public function testNodeLow()
    {
        $this->assertSame(0x3210, $this->uuid->nodeLow());
    }

    public function testString()
    {
        $this->assertSame('01234567-89ab-cdef-fedc-ba9876543210', $this->uuid->string());
    }

    public function testToString()
    {
        $this->assertSame('01234567-89ab-cdef-fedc-ba9876543210', strval($this->uuid));
    }

    public function testBytes()
    {
        $this->assertSame("\x01\x23\x45\x67\x89\xab\xcd\xef\xfe\xdc\xba\x98\x76\x54\x32\x10", $this->uuid->bytes());
    }
}
