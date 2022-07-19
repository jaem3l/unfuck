<?php

declare(strict_types=1);

namespace Jæm3l\Unfuck\Unfucker;

use PhpParser\Node;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Name;
use PhpParser\Node\Param;
use PhpParser\NodeVisitorAbstract;

final class MandatoryUnfucker extends NodeVisitorAbstract
{
    public function leaveNode(Node $node): void
    {
        if (!$node instanceof Param) {
            return;
        }

        if (null === $node->default && !$node->variadic) {
            $node->default = new ConstFetch(new Name('null'));
        }
    }
}
