<?php

declare(strict_types=1);

namespace Jæm3l\Unfuck\Tests;

use Jæm3l\Unfuck\Code;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class CodeTest extends TestCase
{
    #[DataProvider('provideUnfuckCodeScenarios')]
    public function testUnfuck(string $code, string $expected): void
    {
        $actual = Code::unfuck($code);

        self::assertSame($expected, $actual);
    }

    public static function provideUnfuckCodeScenarios(): iterable
    {
        yield 'final' => [
            file_get_contents(__DIR__.'/samples/class-final-input.php'),
            file_get_contents(__DIR__.'/samples/class-final-unfucked.php'),
        ];

        yield 'mandatory' => [
            file_get_contents(__DIR__.'/samples/mandatory-input.php'),
            file_get_contents(__DIR__.'/samples/mandatory-unfucked.php'),
        ];

        yield 'type' => [
            file_get_contents(__DIR__.'/samples/type-input.php'),
            file_get_contents(__DIR__.'/samples/type-unfucked.php'),
        ];

        yield 'visibility' => [
            file_get_contents(__DIR__.'/samples/class-visibility-input.php'),
            file_get_contents(__DIR__.'/samples/class-visibility-unfucked.php'),
        ];

        yield 'readonly' => [
            file_get_contents(__DIR__.'/samples/class-readonly-input.php'),
            file_get_contents(__DIR__.'/samples/class-readonly-unfucked.php'),
        ];
    }
}
