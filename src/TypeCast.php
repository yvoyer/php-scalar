<?php declare(strict_types=1);

namespace Star\Component\PhpType;

final class TypeCast
{
    /**
     * @var array|int|string|bool|float
     */
    private $raw;

    /**
     * @var Type
     */
    private $type;

    private function __construct($raw, Type $type)
    {
        $this->raw = $raw;
        $this->type = $type;
    }

    public function toArray(): array
    {
#        if (! \is_array($this->raw)) {
 #           throw new TypeCastNotSupported($this->type, Type::TYPE_ARRAY);
  #      }

        return (array) $this->raw;
    }

    public function toString(): string
    {
        if (\is_numeric($this->raw)) {
            return \strval($this->raw);
        }

        if (! \is_string($this->raw)) {
            throw new TypeCastNotSupported($this->type, Type::TYPE_STRING);
        }

        return $this->raw;
    }

    public function toInt(): int
    {
        if (! \is_int($this->raw)) {
            throw new TypeCastNotSupported($this->type, Type::TYPE_INT);
        }

        return $this->raw;
    }

    public function toFloat(): float
    {
        if (! \is_float($this->raw) && ! \is_numeric($this->raw)) {
            throw new TypeCastNotSupported($this->type, Type::TYPE_FLOAT);
        }

        return \floatval($this->raw);
    }

    public function toBool(): bool
    {
        if (! \is_bool($this->raw)) {
            throw new TypeCastNotSupported($this->type, Type::TYPE_BOOL);
        }

        return $this->raw;
    }

    public static function asString(string $value, Type $object): self
    {
        return new self($value, $object);
    }

    public static function asInt(int $value, Type $object): self
    {
        return new self($value, $object);
    }

    public static function asFloat(float $value, Type $object): self
    {
        return new self($value, $object);
    }

    public static function asBool(bool $value, Type $object): self
    {
        return new self($value, $object);
    }

    public static function asArray(array $value,Type $object): self
    {
        return new self($value, $object);
    }
}
