<?php declare(strict_types=1);

namespace Star\Component\PhpType;

final class TypeCastNotSupported extends \RuntimeException
{
    public function __construct(Type $object, string $to)
    {
        parent::__construct(
            \sprintf('Type "%s" cannot be casted to "%s".', $object->toTypedString(), $to)
        );
    }
}
