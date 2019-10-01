<?php

declare(strict_types=1);

namespace Eclipxe\MicroCatalog\Tests\Unit\Exceptions;

use Eclipxe\MicroCatalog\Exceptions\BadMethodCallException;
use Eclipxe\MicroCatalog\Exceptions\MicroCatalogException;
use PHPUnit\Framework\TestCase;

class BadMethodCallExceptionTest extends TestCase
{
    public function testConstructorAndValues(): void
    {
        $exception = new BadMethodCallException('foo', 'bar');
        $this->assertInstanceOf(MicroCatalogException::class, $exception);
        $this->assertSame('foo', $exception->getClassName());
        $this->assertSame('bar', $exception->getMethodName());
    }
}
