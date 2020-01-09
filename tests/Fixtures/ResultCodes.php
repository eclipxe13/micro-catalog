<?php

declare(strict_types=1);

namespace Eclipxe\MicroCatalog\Tests\Fixtures;

use Eclipxe\MicroCatalog\MicroCatalog;

/**
 * ResultCodes is an example class to show the basic usage
 *
 * @method bool isOk()
 * @method bool isWarning()
 * @method bool isError()
 */
final class ResultCodes extends MicroCatalog
{
    /** @return array<int, string> */
    public static function getEntriesArray(): array
    {
        return [
            0 => 'Ok',
            1 => 'Warning',
            2 => 'Error',
        ];
    }

    public function getEntryValueOnUndefined(): string
    {
        return 'Undefined';
    }

    public function getEntryId(): string
    {
        return strval($this->getEntryValue());
    }
}
