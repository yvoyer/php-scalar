<?php declare(strict_types=1);

namespace Star\Scalar;

// todo when extension mbstring loaded, use it instead in methods
final class StringObject implements \Countable {
    /**
     * @var string
     */
    private $value;

    public function toString(): string
    {
        return $this->value;
    }

    public function replace(string $search, string $replace): StringObject
    {
        return self::fromString(\str_replace($search, $replace, $this->toString()));
    }

    public function ireplace(string $search, string $replace): StringObject
    {
        return self::fromString(\str_ireplace($search, $replace, $this->toString()));
    }

    public function startsWith(string $search): bool
    {
        return \strpos($this->toString(), $search) === 0;
    }

    public function endsWith(string $search): bool
    {
        return \strpos($this->toString(), $search) === $this->count() - 1;
    }

    public function contains(string $string): bool
    {
        return \strpos($this->toString(), $string) !== false;
    }

    public function reverse(): StringObject
    {
        return StringObject::fromString(\strrev($this->toString()));
    }

    public function shuffle(): StringObject
    {
        return StringObject::fromString(\str_shuffle($this->toString()));
    }

    public function equals(string $string): bool
    {
        return \strcmp($this->toString(), $string) === 0;
    }

    public function findFirst(string $search): IntegerObject
    {
        return IntegerObject::fromInt(\strpos($this->toString(), $search));
    }

    public function findLast(string $search): IntegerObject
    {
        return IntegerObject::fromInt(\strrpos($this->toString(), $search));
    }

    public function count(): int
    {
        return \strlen($this->toString());
    }

    public function length(): IntegerObject
    {
        return IntegerObject::fromInt($this->count());
    }

    public function toLower(): StringObject
    {
        return StringObject::fromString(\strtolower($this->toString()));
    }

    public function toUpper(): StringObject
    {
        return StringObject::fromString(\strtoupper($this->toString()));
    }

    public function upperFirst(): StringObject
    {
        return StringObject::fromString(\ucfirst($this->toString()));
    }

    public function lowerFirst(): StringObject
    {
        return StringObject::fromString(\lcfirst($this->toString()));
    }

    public function upperWords(): StringObject
    {
        return StringObject::fromString(\ucwords($this->toString()));
    }

    public function trim(string $charlist = " \t\n\r\0\x0B"): StringObject
    {
        return StringObject::fromString(\trim($this->toString(), $charlist));
    }

    public function trimRight(string $charlist = " \t\n\r\0\x0B"): StringObject
    {
        return StringObject::fromString(\rtrim($this->toString(), $charlist));
    }

    public function trimLeft(string $charlist = " \t\n\r\0\x0B"): StringObject
    {
        return StringObject::fromString(\ltrim($this->toString(), $charlist));
    }

    public function repeat(int $mulitplier = 1): StringObject
    {
        return StringObject::fromString(\str_repeat($this->toString(), $mulitplier));
    }

    public function chunk(int $length, string $eof = "\n"): StringObject
    {
        return StringObject::fromString(\chunk_split($this->toString(), $length, $eof));
    }

    public function explode(string $delimiter, int $limit = PHP_INT_MAX): ArrayObject
    {
        return ArrayObject::fromArray(\explode($delimiter, $this->toString(), $limit));
    }

    public function substring(int $start, int $length = PHP_INT_MAX): StringObject
    {
        return StringObject::fromString(\substr($this->toString(), $start, $length));
    }

    public function padRight(int $length, string $pad = ' '): StringObject
    {
        return StringObject::fromString(\str_pad($this->toString(), $length, $pad, STR_PAD_RIGHT));
    }

    public function padLeft(int $length, string $pad = ' '): StringObject
    {
        return StringObject::fromString(\str_pad($this->toString(), $length, $pad, STR_PAD_LEFT));
    }

    public function padBoth(int $length, string $pad = ' '): StringObject
    {
        return StringObject::fromString(\str_pad($this->toString(), $length, $pad, STR_PAD_BOTH));
    }

    public static function fromString(string $value): StringObject
    {
        return new self($value);
    }

    public static function fromInt(int $value): StringObject
    {
        return self::fromString(\strval($value));
    }

    public static function fromFloat(float $value): StringObject
    {
        return self::fromString(\strval($value));
    }

    private function __construct(string $value) {
        $this->value = $value;
    }
}
