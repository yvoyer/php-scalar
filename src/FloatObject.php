<?php declare(strict_types=1);

namespace Star\Scalar;

final class FloatObject implements NumberObject
{
    /**
     * @var float
     */
    private $value;

    public function addTo(NumberObject $number): NumberObject
    {
        throw new \RuntimeException('Method ' . __METHOD__ . ' not implemented yet.');
    }

    public function subtractFrom(NumberObject $number): NumberObject
    {
        throw new \RuntimeException('Method ' . __METHOD__ . ' not implemented yet.');
    }

    public function multiplyBy(NumberObject $multiplier): NumberObject
    {
        throw new \RuntimeException('Method ' . __METHOD__ . ' not implemented yet.');
    }

    public function divideBy(NumberObject $divisor): NumberObject
    {
        throw new \RuntimeException('Method ' . __METHOD__ . ' not implemented yet.');
    }

    /**
     * @param number $number
     * @return NumberObject
     */
    public function add($number): NumberObject
    {
        throw new \RuntimeException('Method ' . __METHOD__ . ' not implemented yet.');
    }

    /**
     * @param number $number
     * @return NumberObject
     */
    public function subtract($number): NumberObject
    {
        throw new \RuntimeException('Method ' . __METHOD__ . ' not implemented yet.');
    }

    /**
     * @param number $multiplier
     * @return NumberObject
     */
    public function multiply($multiplier): NumberObject
    {
        throw new \RuntimeException('Method ' . __METHOD__ . ' not implemented yet.');
    }

    /**
     * @param number $divisor
     * @return NumberObject
     */
    public function divide($divisor): NumberObject
    {
        throw new \RuntimeException('Method ' . __METHOD__ . ' not implemented yet.');
    }

    public function toString(): string
    {
        throw new \RuntimeException('Method ' . __METHOD__ . ' not implemented yet.');
    }

    public function toInt(): int
    {
        throw new \RuntimeException('Method ' . __METHOD__ . ' not implemented yet.');
    }

    public function toFloat(): float
    {
        throw new \RuntimeException('Method ' . __METHOD__ . ' not implemented yet.');
    }

    private function __construct(float $value)
    {
        $this->value = $value;
    }
}
