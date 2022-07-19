<?php

class Example
{
    public $foo;
    public function __construct(public $bar = 42)
    {
        $this->foo = 'bar';
    }
}
