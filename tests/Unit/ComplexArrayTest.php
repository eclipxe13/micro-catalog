<?php

declare(strict_types=1);

namespace Eclipxe\MicroCatalog\Tests\Unit;

use Eclipxe\MicroCatalog\Tests\Fixtures\ComplexArray;
use PHPUnit\Framework\TestCase;

class ComplexArrayTest extends TestCase
{
    public function testConstructValidEntry(): void
    {
        $entry = new ComplexArray('Ok');
        $this->assertFalse($entry->isUndefined());
        $this->assertTrue($entry->isOk());
        $this->assertFalse($entry->isDuplicated());
        $this->assertFalse($entry->isNotFound());
        $this->assertSame(1000, $entry->getCode());
        $this->assertSame('Success transaction', $entry->getMessage());
    }

    public function testConstructNonExistentEntry(): void
    {
        $entry = new ComplexArray('non-existent');
        $this->assertTrue($entry->isUndefined());
        $this->assertSame('non-existent', $entry->getEntryId());
        $this->assertSame(0, $entry->getCode());
        $this->assertSame('Unknown transaction result', $entry->getMessage());
    }

    public function testCallGetWhenKeyDoesNotExists(): void
    {
        $entry = new ComplexArray('Ok');
        $this->assertNull($entry->{'getUndefinedMethod'}());
    }
}
