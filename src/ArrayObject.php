<?php declare(strict_types=1);

namespace Star\Scalar;

final class ArrayObject
{
    /**
     * @var array
     */
    private $value;

    private function __construct(array $value)
    {
        $this->value = $value;
    }

    public function implode(string $delimiter): StringObject
    {
        return StringObject::fromString(\implode($delimiter, $this->value));
    }

    public function map(\Closure $closure): ArrayObject
    {
        return ArrayObject::fromArray(\array_map($closure, $this->value));
    }

    public function keys(): ArrayObject
    {
    }

    public function unique(): ArrayObject
    {}

    public function merge(array $value): ArrayObject
    {}

    public function flip(): ArrayObject
    {}

    public function filter(): ArrayObject
    {}

    public function keyExists(): ArrayObject
    {}

    public function valueExists($needle): bool
    {
        return false !== \array_search($needle, $this->value, true);
    }

    public function search($needle)
    {
        return \array_search($needle, $this->value, true);
    }

    public function chunk(): ArrayObject
    {}

    public function pad(): ArrayObject
    {}

    public function pop(): ArrayObject
    {
        $array = $this->value;
        \array_pop($array);
        return ArrayObject::fromArray($array);
    }

    public function push($var, ...$values): ArrayObject
    {
        $array = $this->value;
        \array_push($array, $var, ...$values);
        return ArrayObject::fromArray($array);
    }

    public function reduce(): ArrayObject
    {

    }

    public function replace(): ArrayObject
    {}

    public function shuffle(): ArrayObject
    {}

    public function reverse(): ArrayObject
    {}

    public function shift(): ArrayObject
    {}

    public function prepend(): ArrayObject
    {
    }

    public function slice(): ArrayObject
    {}

    public function splice(): ArrayObject
    {}

    public function sum(): ArrayObject
    {}

    public function product(): ArrayObject
    {}

    public function values(): ArrayObject
    {
        return ArrayObject::fromArray(\array_values($this->value));
    }

    public function walk(): ArrayObject
    {}

    public static function fromArray(array $value): ArrayObject
    {
        return new self($value);
    }
}
