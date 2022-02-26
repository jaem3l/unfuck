<?php

declare(strict_types=1);

namespace Jæm3l\Unfuck\Unfucker;

use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassConst;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Property;
use PhpParser\NodeVisitorAbstract;

class VisibilityUnfucker extends NodeVisitorAbstract
{
    public function leaveNode(Node $node): void
    {
        if (!$node instanceof ClassMethod && !$node instanceof Property && !$node instanceof ClassConst) {
            return;
        }

        if ($node->isProtected()) {
            $node->flags ^= Class_::MODIFIER_PROTECTED;
            $node->flags |= Class_::MODIFIER_PUBLIC;
        } elseif ($node->isPrivate()) {
            $node->flags ^= Class_::MODIFIER_PRIVATE;
            $node->flags |= Class_::MODIFIER_PUBLIC;
        }
    }
}
