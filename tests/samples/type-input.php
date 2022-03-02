<?php

class Example
{
    public int $foo;
    public function getFoo(): int
    {
        return $this->foo;
    }
    public function setFoo(int $foo): void
    {
        $this->foo = $foo;
    }
}
function foo(): int
{
}
function bar(int $baz): void
{
}
