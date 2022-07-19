<?php

readonly class Example
{
    private readonly string $foo;
    public function __construct(public readonly int $bar = 42)
    {
        $this->foo = 'bar';
    }
}
