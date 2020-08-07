<?php declare(strict_types=1);

namespace Star\Component\PhpType\Core;

use Star\Component\PhpType\NumberType;
use Star\Component\PhpType\TypeCast;

final class FloatObject implements NumberType
{
    /**
     * @var float
     */
    private $value;

    public function cast(): TypeCast
    {
        throw new \RuntimeException(__METHOD__ . ' not implemented yet.');
    }

    public function toTypedString(): string
    {
        throw new \RuntimeException(__METHOD__ . ' not implemented yet.');
    }

    private function __construct(float $value)
    {
        $this->value = $value;
    }
}
