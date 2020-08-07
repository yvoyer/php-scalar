<?php declare(strict_types=1);

namespace Star\Component\PhpType\Core;

use Star\Component\PhpType\IntegerType;
use Star\Component\PhpType\TypeCast;

final class IntegerObject implements IntegerType
{
    /**
     * @var int
     */
    private $value;

    public function cast(): TypeCast
    {
        return TypeCast::asInt($this->value, $this);
    }

    public function toInt(): int
    {
        return $this->cast()->toInt();
    }

    public function toTypedString(): string
    {
        return \sprintf('%s(%s)', self::TYPE_INT, $this->value);
    }

    public static function fromInt(int $value): IntegerType
    {
        return new self($value);
    }

    private function __construct(int $value)
    {
        $this->value = $value;
    }
}
