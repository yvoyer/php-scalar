<?php declare(strict_types=1);

namespace Star\Component\PhpType;

interface IntegerType extends NumberType
{
    public function toInt(): int;
}
