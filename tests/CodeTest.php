<?php

declare(strict_types=1);

namespace Jæm3l\Unfuck\Tests;

use Jæm3l\Unfuck\Code;
use PHPUnit\Framework\TestCase;

final class CodeTest extends TestCase
{
    /**
     * @dataProvider provideUnfuckCodeScenarios
     */
    public function testUnfuck(string $code, string $expected): void
    {
        $actual = Code::unfuck($code);

        static::assertSame($expected, $actual);
    }

    public function provideUnfuckCodeScenarios(): iterable
    {
        yield 'final' => [
            file_get_contents(__DIR__.'/samples/class-final-input.php'),
            file_get_contents(__DIR__.'/samples/class-final-unfucked.php'),
        ];

        yield 'mandatory' => [
            file_get_contents(__DIR__.'/samples/class-mandatory-input.php'),
            file_get_contents(__DIR__.'/samples/class-mandatory-unfucked.php'),
        ];

        yield 'type' => [
            file_get_contents(__DIR__.'/samples/class-type-input.php'),
            file_get_contents(__DIR__.'/samples/class-type-unfucked.php'),
        ];

        yield 'visibility' => [
            file_get_contents(__DIR__.'/samples/class-visibility-input.php'),
            file_get_contents(__DIR__.'/samples/class-visibility-unfucked.php'),
        ];
    }
}