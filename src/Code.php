<?php

declare(strict_types=1);

namespace Jæm3l\Unfuck;

use Jæm3l\Unfuck\Unfucker\FinalUnfucker;
use Jæm3l\Unfuck\Unfucker\MandatoryUnfucker;
use Jæm3l\Unfuck\Unfucker\TypeUnfucker;
use Jæm3l\Unfuck\Unfucker\VisibilityUnfucker;
use PhpParser\Error;
use PhpParser\NodeTraverser;
use PhpParser\Parser;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;

final class Code
{
    public static function unfuck(string $code): string
    {
        try {
            $ast = self::getParser()->parse($code);
        } catch (Error) {
            return $code;
        }

        $unfuckedAst = self::getNodeTraverser()->traverse($ast);
        $unfuckedCode = (new Standard())->prettyPrint($unfuckedAst);

        return '<?php'.PHP_EOL.PHP_EOL.$unfuckedCode.PHP_EOL;
    }

    private static function getParser(): Parser
    {
        return (new ParserFactory())->create(ParserFactory::ONLY_PHP7);
    }

    private static function getNodeTraverser(): NodeTraverser
    {
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new FinalUnfucker());
        $traverser->addVisitor(new MandatoryUnfucker());
        $traverser->addVisitor(new TypeUnfucker());
        $traverser->addVisitor(new VisibilityUnfucker());

        return $traverser;
    }
}
