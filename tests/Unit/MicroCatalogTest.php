<?php

declare(strict_types=1);

namespace Eclipxe\MicroCatalog\Tests\Unit;

use Eclipxe\MicroCatalog\Exceptions\BadMethodCallException;
use Eclipxe\MicroCatalog\Tests\Fixtures\ComplexObject;
use Eclipxe\MicroCatalog\Tests\Fixtures\ResultCodes;
use PHPUnit\Framework\TestCase;

/**
 * The main cases are in BasicTest & ComplexArrayTest
 * This tests exist to assert edge cases
 */
class MicroCatalogTest extends TestCase
{
    public function testCallIsMethodThrowsException(): void
    {
        $catalog = new ResultCodes(0);
        $this->expectException(BadMethodCallException::class);
        $catalog->{'is'}(); /** @phpstan-ignore method.notFound */
    }

    public function testCallGetMethodThrowsException(): void
    {
        $catalog = new ResultCodes(0);
        $this->expectException(BadMethodCallException::class);
        $catalog->{'get'}(); /** @phpstan-ignore method.notFound */
    }

    public function testCallIsMethodUsingUppercase(): void
    {
        $catalog = new ResultCodes(0);
        $this->assertTrue($catalog->isOk());
        $this->assertTrue($catalog->{'ISOK'}()); /** @phpstan-ignore method.notFound */
    }

    public function testCallGetMethodUsingValidCaseReturnsNotNull(): void
    {
        $catalog = new ComplexObject('User');
        $this->assertNotNull($catalog->{'getName'}()); /** @phpstan-ignore method.alreadyNarrowedType */
        // ComplexObject traduces name to Name
        $this->assertNotNull($catalog->{'getname'}()); /** @phpstan-ignore method.notFound */
        $this->assertNotNull($catalog->{'GetName'}()); /** @phpstan-ignore method.notFound */
        $this->assertNotNull($catalog->{'gEtName'}()); /** @phpstan-ignore method.notFound */
        $this->assertNotNull($catalog->{'geTName'}()); /** @phpstan-ignore method.notFound */
    }

    public function testCallGetMethodUsingInvalidCaseReturnsNull(): void
    {
        $catalog = new ComplexObject('User');
        // Invalid because of NAME
        $this->assertNull($catalog->{'GETNAME'}()); /** @phpstan-ignore method.notFound */
        // Invalid because of NAME
        $this->assertNull($catalog->{'getNAME'}()); /** @phpstan-ignore method.notFound */
        // Invalid because of NamE
        $this->assertNull($catalog->{'getNamE'}()); /** @phpstan-ignore method.notFound */
    }
}
