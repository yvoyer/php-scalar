<?php declare(strict_types=1);

namespace Star\Component\PhpType;

final class DivisionByZero extends \InvalidArgumentException
{
    public function __construct(NumberType $type)
    {
        parent::__construct(\sprintf('Cannot divide type "%s" by zero.', $type->toTypedString()));
    }
}
