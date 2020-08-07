<?php declare(strict_types=1);

namespace Star\Component\PhpType\Core;

use Star\Component\PhpType\ArrayType;
use Star\Component\PhpType\StringType;
use Star\Component\PhpType\TypeCast;

final class ArrayObject implements ArrayType
{
    /**
     * @var array
     */
    private $values;

    private function __construct(array $value)
    {
        $this->values = $value;
    }

    public function cast(): TypeCast
    {
        throw new \RuntimeException(__METHOD__ . ' not implemented yet.');
    }

    public function toTypedString(): string
    {
        return \sprintf('%s(%s)', self::TYPE_ARRAY, $this->implode(',')->toString());
    }

    public function implode(string $delimiter): StringType
    {
        return StringObject::fromString(\implode($delimiter, $this->values));
    }

    public function map(\Closure $closure): ArrayType
    {
        return ArrayObject::fromArray(\array_map($closure, $this->values));
    }

    public function keys(): ArrayType
    {
    }

    public function unique(): ArrayType
    {}

    public function merge(array $value): ArrayType
    {}

    public function flip(): ArrayType
    {}

    public function filter(): ArrayType
    {}

    public function keyExists(): ArrayType
    {}

    public function valueExists($needle): bool
    {
        return false !== \array_search($needle, $this->values, true);
    }

    public function search($needle)
    {
        return \array_search($needle, $this->values, true);
    }

    public function chunk(): ArrayType
    {}

    public function pad(): ArrayType
    {}

    public function pop(): ArrayType
    {
        $array = $this->values;
        \array_pop($array);
        return ArrayObject::fromArray($array);
    }

    public function push($var, ...$values): ArrayType
    {
        $array = $this->values;
        \array_push($array, $var, ...$values);
        return ArrayObject::fromArray($array);
    }

    public function reduce(): ArrayType
    {

    }

    public function replace(): ArrayType
    {}

    public function shuffle(): ArrayType
    {}

    public function reverse(): ArrayType
    {}

    public function shift(): ArrayType
    {}

    public function prepend(): ArrayType
    {
    }

    public function slice(): ArrayType
    {}

    public function splice(): ArrayType
    {}

    public function sum(): ArrayType
    {}

    public function product(): ArrayType
    {}

    public function values(): ArrayType
    {
        return ArrayObject::fromArray(\array_values($this->values));
    }

    public function walk(callable $callback): ArrayType
    {
        $before = $this->values;
#        \array_walk($before, $callback);

        return self::fromArray($before);
    }

    public static function fromArray(array $value): ArrayType
    {
        return new self($value);
    }
}
