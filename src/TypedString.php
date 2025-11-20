<?php declare(strict_types=1);

namespace Star\Component\PhpType;

final class TypedString
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $value;

    public function toString(): string
    {
        return \sprintf('%s(%s)', $this->type, $this->value);
    }

    public static function asString(string $value): self
    {
        return new self(Type::TYPE_STRING, $value);
    }

    public static function asInt(string $value): self
    {
        return new self(Type::TYPE_INT, $value);
    }

    public static function asFloat(string $value): self
    {
        return new self(Type::TYPE_FLOAT, $value);
    }

    public static function asBoolean(string $value): self
    {
        return new self(Type::TYPE_BOOL, $value);
    }

    public static function asArray(string $value): self
    {
        return new self(Type::TYPE_ARRAY, $value);
    }

    private function __construct(string $type, string $value)
    {
        $this->type = $type;
        $this->value = $value;
    }
}
