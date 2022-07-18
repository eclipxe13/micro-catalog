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
 *
 * @extends MicroCatalog<array{code: int, message: string}>
 */
final class ComplexArray extends MicroCatalog
{
    public static function getEntriesArray(): array
    {
        return [
            'Ok' => ['code' => 1000, 'message' => 'Success transaction'],
            'Duplicated' => ['code' => 1001, 'message' => 'Duplicated entry'],
            'NotFound' => ['code' => 1002, 'message' => 'Entry not found'],
        ];
    }

    public function getEntryValueOnUndefined(): array
    {
        return [
            'code' => 0,
            'message' => 'Unknown transaction result',
        ];
    }
}
