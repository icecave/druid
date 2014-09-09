<?php
namespace Icecave\Druid;

/**
 * Generates a UUID.
 */
interface UuidGeneratorInterface
{
    /**
     * Generate a UUID.
     *
     * @return UuidInterface
     */
    public function generate();
}
