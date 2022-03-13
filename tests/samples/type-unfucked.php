<?php

class Example
{
    public $foo;
    public function getFoo()
    {
        return $this->foo;
    }
    public function setFoo($foo = null)
    {
        $this->foo = $foo;
    }
}
function foo()
{
}
function bar($baz = null)
{
}
