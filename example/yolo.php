<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

// The next line is not require in your project -> Done by the Composer Plugin
\Jæm3l\Unfuck\Unfuck::setup();

use Jæm3l\UnfuckDemo\Example;

$inst = new class extends Example{};
$inst->foo = 42;

var_dump($inst->getFoo());

echo 'The test was a success, the project a failure.';

__halt_compiler();

.##....##..#######..##........#######..
..##..##..##.....##.##.......##.....##.
...####...##.....##.##.......##.....##.
....##....##.....##.##.......##.....##.
....##....##.....##.##.......##.....##.
....##....##.....##.##.......##.....##.
....##.....#######..########..#######..
