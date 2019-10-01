<?php

declare(strict_types=1);

namespace Eclipxe\MicroCatalog\Tests\Fixtures;

use Eclipxe\MicroCatalog\MicroCatalog;
use OutOfRangeException;

/**
 * ComplexObject example class
 * - Entry values are objects
 * - Does not allow undefined indexes
 *
 * @method string getName()
 * @method string getGid()
 * @method bool isAdmin()
 * @method bool isUser()
 */
final class ComplexObject extends MicroCatalog
{
    public static function getEntriesArray(): array
    {
        return [
            'Admin' => (object) ['Name' => 'System administrator', 'Gid' => '000'],
            'User' => (object) ['Name' => 'Regular user', 'Gid' => '100'],
        ];
    }

    protected function getEntryValueWithKey(string $key)
    {
        $key = ucfirst($key);
        return parent::getEntryValueWithKey($key);
    }

    public function getEntryValueOnUndefined(): void
    {
        throw new OutOfRangeException('The role is not defined');
    }

    public function isUndefined(): bool
    {
        return false;
    }
}
