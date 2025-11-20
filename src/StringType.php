<?php declare(strict_types=1);

namespace Star\Component\PhpType;

use Countable;

final class StringType implements Type, Countable {
    /**
     * @var string
     */
    private $value;

    public function count(): int
    {
        return \strlen($this->toString());
    }

    public function contains(string $string): bool
    {
        return \strpos($this->toString(), $string) !== false;
    }

    public function endsWith(string $search): bool
    {
        return \strpos($this->toString(), $search) === $this->count() - 1;
    }

    public function equals(string $string): bool
    {
        return \strcmp($this->toString(), $string) === 0;
    }

    public function explode(string $delimiter, int $limit = PHP_INT_MAX): ArrayType
    {
        return ArrayType::fromArray(\explode($delimiter, $this->toString(), $limit));
    }

    public function findFirstPosition(string $search): NumberType
    {
        return NumberType::fromInt(\strpos($this->toString(), $search));
    }

    public function findLastPosition(string $search): NumberType
    {
        return NumberType::fromInt(\strrpos($this->toString(), $search));
    }

    public function length(): NumberType
    {
        return NumberType::fromInt($this->count());
    }

    public function pad(int $length, string $pad = ' '): StringType
    {
        return StringType::fromString(\str_pad($this->toString(), $length, $pad, STR_PAD_BOTH));
    }

    public function padRight(int $length, string $pad = ' '): StringType
    {
        return StringType::fromString(\str_pad($this->toString(), $length, $pad, STR_PAD_RIGHT));
    }

    public function padLeft(int $length, string $pad = ' '): StringType
    {
        return StringType::fromString(\str_pad($this->toString(), $length, $pad, STR_PAD_LEFT));
    }

    public function repeat(int $multiplier): StringType
    {
        return StringType::fromString(\str_repeat($this->toString(), $multiplier));
    }

    public function replaceWithCase(string $search, string $replace): StringType
    {
        return self::fromString(\str_replace($search, $replace, $this->value));
    }

    public function replaceWithoutCase(string $search, string $replace): StringType
    {
        return self::fromString(\str_ireplace($search, $replace, $this->toString()));
    }

    public function reverse(): StringType
    {
        return StringType::fromString(\strrev($this->toString()));
    }

    public function shuffle(): StringType
    {
        return StringType::fromString(\str_shuffle($this->toString()));
    }

    public function split(int $length, string $eof = "\n"): StringType
    {
        return StringType::fromString(\chunk_split($this->toString(), $length, $eof));
    }

    public function startsWith(string $search): bool
    {
        return \strpos($this->toString(), $search) === 0;
    }

    public function substring(int $start, int $length = PHP_INT_MAX): StringType
    {
        return StringType::fromString(\substr($this->toString(), $start, $length));
    }

    public function toLower(): StringType
    {
        return StringType::fromString(\strtolower($this->toString()));
    }

    public function toLowerFirst(): StringType
    {
        return StringType::fromString(\lcfirst($this->toString()));
    }

    public function toString(): string
    {
        return $this->value;
    }

    public function toTypedString(): string
    {
        return TypedString::asString($this->toString())->toString();
    }

    public function toUpper(): StringType
    {
        return StringType::fromString(\strtoupper($this->toString()));
    }

    public function toUpperFirst(): StringType
    {
        return StringType::fromString(\ucfirst($this->toString()));
    }

    public function toUpperWords(): StringType
    {
        return StringType::fromString(\ucwords($this->toString()));
    }

    public function trim(string $charlist = " \t\n\r\0\x0B"): StringType
    {
        return StringType::fromString(\trim($this->toString(), $charlist));
    }

    public function trimLeft(string $charlist = " \t\n\r\0\x0B"): StringType
    {
        return StringType::fromString(\ltrim($this->toString(), $charlist));
    }

    public function trimRight(string $charlist = " \t\n\r\0\x0B"): StringType
    {
        return StringType::fromString(\rtrim($this->toString(), $charlist));
    }

    public static function fromString(string $value): StringType
    {
        return new self($value);
    }

    public static function fromInt(int $value): StringType
    {
        return self::fromString(\strval($value));
    }

    public static function fromFloat(float $value): StringType
    {
        return self::fromString(\strval($value));
    }

    private function __construct(string $value) {
        $this->value = $value;
    }
}
