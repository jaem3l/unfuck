<?php

declare(strict_types=1);

namespace Jæm3l\UnfuckDemo;

final class Example
{
    private string $foo;

    public function __construct(string $foo)
    {
        $this->foo = $foo;
    }

    private function getFoo(): string
    {
        return $this->foo;
    }
}
