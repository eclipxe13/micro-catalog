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
        $catalog->{'is'}();
    }

    public function testCallGetMethodThrowsException(): void
    {
        $catalog = new ResultCodes(0);
        $this->expectException(BadMethodCallException::class);
        $catalog->{'get'}();
    }

    public function testCallIsMethodUsingUppercase(): void
    {
        $catalog = new ResultCodes(0);
        $this->assertTrue($catalog->isOk());
        $this->assertTrue($catalog->{'ISOK'}());
    }

    public function testCallGetMethodUsingValidCaseReturnsNotNull(): void
    {
        $catalog = new ComplexObject('User');
        $this->assertNotNull($catalog->{'getName'}());
        $this->assertNotNull($catalog->{'getname'}()); // ComplexObject traduces name to Name
        $this->assertNotNull($catalog->{'GetName'}());
        $this->assertNotNull($catalog->{'gEtName'}());
        $this->assertNotNull($catalog->{'geTName'}());
    }

    public function testCallGetMethodUsingInvalidCaseReturnsNull(): void
    {
        $catalog = new ComplexObject('User');
        $this->assertNull($catalog->{'GETNAME'}()); // NAME invalid
        $this->assertNull($catalog->{'getNAME'}()); // NAME invalid
        $this->assertNull($catalog->{'getNamE'}()); // NamE invalid
    }
}
