<?php declare(strict_types=1);

namespace Star\Component\PhpType;

interface Type
{
    const TYPE_STRING = 'string';
    const TYPE_ARRAY = 'array';
    const TYPE_INT = 'integer';
    const TYPE_FLOAT = 'float';
    const TYPE_BOOL = 'boolean';

    public function toTypedString(): string;

    public function cast(): TypeCast;
}
