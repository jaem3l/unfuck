<?php

declare(strict_types=1);

namespace Jæm3l\Unfuck\Unfucker;

use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\NodeVisitorAbstract;

class FinalUnfucker extends NodeVisitorAbstract
{
    public function enterNode(Node $node): void
    {
        if (!$node instanceof Class_ && !$node instanceof ClassMethod) {
            return;
        }

        if (!$node->isFinal()) {
            return;
        }

        $node->flags &= T_FINAL;
    }
}
