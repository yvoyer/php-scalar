<?php declare(strict_types=1);

namespace Star\Scalar;

interface NumberObject
{
    public function addTo(NumberObject $number): NumberObject;
    public function subtractFrom(NumberObject $number): NumberObject;
    public function multiplyBy(NumberObject $multiplier): NumberObject;
    public function divideBy(NumberObject $divisor): NumberObject;

    /**
     * @param number $number
     * @return NumberObject
     */
    public function add($number): NumberObject;

    /**
     * @param number $number
     * @return NumberObject
     */
    public function subtract($number): NumberObject;

    /**
     * @param number $multiplier
     * @return NumberObject
     */
    public function multiply($multiplier): NumberObject;

    /**
     * @param number $divisor
     * @return NumberObject
     */
    public function divide($divisor): NumberObject;

    public function toString(): string;
    public function toInt(): int;
    public function toFloat(): float;
}
