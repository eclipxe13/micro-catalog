<?php

declare(strict_types=1);

namespace Eclipxe\MicroCatalog\Tests\Unit;

use BadMethodCallException;
use Eclipxe\MicroCatalog\Exceptions\IndexTypeError;
use Eclipxe\MicroCatalog\Tests\Fixtures\ResultCodes;
use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{
    public function testCreateExistentItem(): void
    {
        $code = new ResultCodes(0);
        $this->assertSame(0, $code->getEntryIndex());
        $this->assertSame('Ok', $code->getEntryValue());
        $this->assertFalse($code->isUndefined());
        $this->assertTrue($code->isOk());
        $this->assertFalse($code->isWarning());
    }

    public function testCreateNonExistentItem(): void
    {
        $code = new ResultCodes('foo');
        $this->assertSame('foo', $code->getEntryIndex());
        $this->assertTrue($code->isUndefined());
        $this->assertSame('Undefined', $code->getEntryValue());
        $this->assertFalse($code->isWarning());
    }

    public function testConstructWithNonStringOrInteger(): void
    {
        $invalidIndex = (object)[];

        $this->expectException(IndexTypeError::class);
        $this->expectExceptionMessage(sprintf('Argument passed to %s must be integer or string', ResultCodes::class));
        new ResultCodes($invalidIndex); /** @phpstan-ignore-line */
    }

    public function testCallUndefinedMethod(): void
    {
        $code = new ResultCodes('foo');
        $this->assertSame('foo', $code->getEntryIndex());

        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage(
            sprintf('Call to undefined method %s::undefinedMethod', ResultCodes::class)
        );
        $code->{'undefinedMethod'}(); /** @phpstan-ignore method.notFound */
    }

    public function testCallGetWhenKeyDoesNotExists(): void
    {
        $entry = new ResultCodes(0);
        $this->assertNull($entry->{'getUndefinedMethod'}()); /** @phpstan-ignore method.notFound */
    }
}
