<?php

declare(strict_types=1);

namespace Jæm3l\Unfuck;

final class Unfuck
{
    public static function setup(): void
    {
        stream_wrapper_unregister(Wrapper::PROTOCOL);
        stream_wrapper_register(Wrapper::PROTOCOL, Wrapper::class);
    }

    public static function inject(string $autoloadPath): void
    {
        $content = file_get_contents($autoloadPath);
        $parts = explode('return', $content);
        $new = $parts[0].'$loader = '.$parts[1].__CLASS__.'::setup();'.PHP_EOL.PHP_EOL.'return $loader;'.PHP_EOL;

        file_put_contents($autoloadPath, $new);
    }
}
