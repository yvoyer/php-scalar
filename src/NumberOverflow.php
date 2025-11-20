<?php declare(strict_types=1);

namespace Star\Component\PhpType;

final class NumberOverflow extends \RuntimeException
{
    public function __construct(TypedString $number, string $type)
    {
        parent::__construct(
            \sprintf(
                'Casting the number "%s" to %s would result in an overflow of the INT value (%s to %s allowed).',
                $number->toString(),
                $type,
                PHP_INT_MAX,
                PHP_INT_MIN
            )
        );
    }
}
