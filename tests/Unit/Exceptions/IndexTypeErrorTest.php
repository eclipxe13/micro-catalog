<?php

declare(strict_types=1);

namespace Eclipxe\MicroCatalog\Tests\Unit\Exceptions;

use Eclipxe\MicroCatalog\Exceptions\IndexTypeError;
use Eclipxe\MicroCatalog\Exceptions\MicroCatalogException;
use PHPUnit\Framework\TestCase;

class IndexTypeErrorTest extends TestCase
{
    public function testConstructorAndValues(): void
    {
        $exception = new IndexTypeError('foo', null);
        $this->assertInstanceOf(MicroCatalogException::class, $exception);
        $this->assertSame('foo', $exception->getClassName());
        $this->assertNull($exception->getArgument());
    }
}
