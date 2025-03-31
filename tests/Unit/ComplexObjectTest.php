<?php

declare(strict_types=1);

namespace Eclipxe\MicroCatalog\Tests\Unit;

use Eclipxe\MicroCatalog\Tests\Fixtures\ComplexObject;
use OutOfRangeException;
use PHPUnit\Framework\TestCase;

class ComplexObjectTest extends TestCase
{
    public function testConstructValidEntry(): void
    {
        $entry = new ComplexObject('Admin');
        $this->assertFalse($entry->isUndefined());
        $this->assertTrue($entry->isAdmin());
        $this->assertFalse($entry->isUser());
        $this->assertSame('System administrator', $entry->getName());
        $this->assertSame('000', $entry->getGid());
    }

    public function testConstructNonExistentEntry(): void
    {
        // the testing class throws an standar OutOfRangeException exception on undefined
        $this->expectException(OutOfRangeException::class);
        new ComplexObject('non-existent');
    }

    public function testCallGetWhenKeyDoesNotExists(): void
    {
        $entry = new ComplexObject('User');
        $this->assertNull($entry->{'getUndefinedMethod'}()); /** @phpstan-ignore method.notFound */
    }
}
