<?php

declare(strict_types=1);

namespace Jæm3l\Unfuck\Unfucker;

use PhpParser\Modifiers;
use PhpParser\Node;
use PhpParser\Node\Stmt\ClassConst;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Property;
use PhpParser\NodeVisitorAbstract;

final class VisibilityUnfucker extends NodeVisitorAbstract
{
    public function leaveNode(Node $node): void
    {
        if (!$node instanceof ClassMethod && !$node instanceof Property && !$node instanceof ClassConst) {
            return;
        }

        if ($node->isProtected()) {
            $node->flags ^= Modifiers::PROTECTED;
            $node->flags |= Modifiers::PUBLIC;
        } elseif ($node->isPrivate()) {
            $node->flags ^= Modifiers::PRIVATE;
            $node->flags |= Modifiers::PUBLIC;
        }
    }
}
