<?php

declare(strict_types=1);

namespace Eclipxe\MicroCatalog\Tests\Fixtures;

use Eclipxe\MicroCatalog\MicroCatalog;

/**
 * Class ComplexArray
 * @method int getCode()
 * @method string getMessage()
 * @method bool isOk()
 * @method bool isDuplicated()
 * @method bool isNotFound()
 */
final class ComplexArray extends MicroCatalog
{
    /** @return array[] */
    public static function getEntriesArray(): array
    {
        return [
            'Ok' => ['code' => 1000, 'message' => 'Success transaction'],
            'Duplicated' => ['code' => 1001, 'message' => 'Duplicated entry'],
            'NotFound' => ['code' => 1002, 'message' => 'Entry not found'],
        ];
    }

    /** @return array<string, mixed> */
    public function getEntryValueOnUndefined(): array
    {
        return [
            'code' => 0,
            'message' => 'Unknown transaction result',
        ];
    }
}
