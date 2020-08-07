<?php declare(strict_types=1);

namespace Star\Component\PhpType;

use Star\Component\PhpType\Core\IntegerObject;
use Star\Component\PhpType\Core\StringObject;

interface StringType extends Type, \Countable
{
    public function contains(string $search): bool;
    public function endsWith(string $search): bool;
    public function equals(string $string): bool;
    public function explode(string $delimiter, int $limit = PHP_INT_MAX): ArrayType;
    public function findFirstPosition(string $search): IntegerType;
    public function findLastPosition(string $search): IntegerType;
    public function length(): IntegerType;
    public function pad(int $length, string $pad = ' '): StringType;
    public function padLeft(int $length, string $pad = ' '): StringType;
    public function padRight(int $length, string $pad = ' '): StringType;
    public function repeat(int $multiplier): StringType;
    public function replaceWithCase(string $search, string $replace): StringType;
    public function replaceWithoutCase(string $search, string $replace): StringType;
    public function reverse(): StringType;
    public function shuffle(): StringType;
    public function split(int $length, string $eof = "\n"): StringType;
    public function startsWith(string $search): bool;
    public function substring(int $start, int $length = PHP_INT_MAX): StringType;
    public function toLower(): StringType;
    public function toLowerFirst(): StringType;
    public function toString(): string;
    public function toUpper(): StringType;
    public function toUpperFirst(): StringType;
    public function toUpperWords(): StringType;
    public function trim(string $charlist = " \t\n\r\0\x0B"): StringType;
    public function trimLeft(string $charlist = " \t\n\r\0\x0B"): StringType;
    public function trimRight(string $charlist = " \t\n\r\0\x0B"): StringType;
}
