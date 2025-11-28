# Jæm3l Unfuck

Since years the evolution of PHP has made it harder and harder to use vendor code without
giving a fuck about the runtime.

So, if you are tired by the burden OSS maintainers are putting onto you by
 * using the `final` keyword on classes or methods
 * reducing the visibility of properties or methods to `private` or `protected`
 * limiting capabilities by adding type declarations, return types or typed properties
 * forcing you to pass method arguments by making them mandatory
 * enforcing immutability with harsh `readonly` modifiers
 * improving runtime stability 
 
Jæm3l got you covered!

Just install jaem3l/unfuck to unfuck the vendor code you're using and fuck up your own:
```
$ composer require jaem3l/unfuck
```

**Jæm3l Unfuck** will hook into the runtime to get rid of all that painful limitations and give
you all that freedom to shoot yourself in the foot, back or head the way you desire the most.

## Example

Your vendor library provides you a feature class like

```php
final class Example
{
    private readonly string $foo;

    public function __construct(string $foo)
    {
        $this->foo = $foo;
    }

    private function getFoo(): string
    {
        return $this->foo;
    }
}
```

but you're sure you want to use it like this:

```php
$inst = new class extends Example{};
$inst->foo = 42;

var_dump($inst->getFoo());
```

With **Jæm3l Unfuck** you are finally free to do it.
YOLO

PS: This might impact runtime performance in time and memory consumption. But if you
install this, you've already proven that you don't really care about your runtime. Why
should this stop you?!
