<?php

declare(strict_types=1);

namespace Jæm3l\Unfuck\Unfucker;

use PhpParser\Node;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Function_;
use PhpParser\Node\Stmt\Property;
use PhpParser\NodeVisitorAbstract;

final class TypeUnfucker extends NodeVisitorAbstract
{
    public function leaveNode(Node $node): void
    {
        if ($node instanceof Property) {
            $node->type = null;
        }

        if ($node instanceof ClassMethod) {
            $node->returnType = null;
        }

        if ($node instanceof Function_) {
            $node->returnType = null;
        }

        if ($node instanceof Param) {
            $node->type = null;
        }
    }
}
