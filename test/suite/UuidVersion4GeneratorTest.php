<?php
namespace Icecave\Druid;

use Icecave\Isolator\Isolator;
use Phake;
use PHPUnit_Framework_TestCase;

class UuidVersion4GeneratorTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->isolator = Phake::mock(Isolator::className());
        $this->generator = new UuidVersion4Generator($this->isolator);

        Phake::when($this->isolator)
            ->mt_rand(0, 0xffff)
            ->thenReturn(0xaaaa)
            ->thenReturn(0xbbbb)
            ->thenReturn(0xcccc)
            ->thenReturn(0xdddd)
            ->thenReturn(0xeeee)
            ->thenReturn(0xffff)
            ->thenReturn(0x1111)
            ->thenReturn(0x2222);

        Phake::when($this->isolator)
            ->mt_rand(0, 0xff)
            ->thenReturn(0x22)
            ->thenReturn(0x33)
            ->thenReturn(0x44);
    }

    public function testGenerate()
    {
        $uuid = $this->generator->generate();

        // RFC-4122: Set the two most significant bits (bits 6 and 7) of the
        //           clock_seq_hi_and_reserved to zero and one, respectively
        $this->assertSame($uuid->clockSeqHi() >> 6, 2);

        // RFC-4122: Set the four most significant bits (bits 12 through 15) of the
        //           time_hi_and_version field to the 4-bit version number from
        //           Section 4.1.3.
        $this->assertSame($uuid->timeHi() >> 12, 4);

        $this->assertSame('aaaabbbb-cccc-4ddd-a233-eeeeffff1111', $uuid->string());
    }
}
