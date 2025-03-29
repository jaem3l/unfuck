<?php

declare(strict_types=1);

namespace Jæm3l\Unfuck\Unfucker;

use PhpParser\Modifiers;
use PhpParser\Node;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\Property;
use PhpParser\NodeVisitorAbstract;

final class ReadonlyUnfucker extends NodeVisitorAbstract
{
    public function leaveNode(Node $node): void
    {
        if (!$node instanceof Property && !$node instanceof Class_ && !$node instanceof Param) {
            return;
        }

        if (!$node->isReadonly()) {
            return;
        }

        $node->flags ^= Modifiers::READONLY;
    }
}
