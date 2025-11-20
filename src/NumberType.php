<?php declare(strict_types=1);

namespace Star\Component\PhpType;

final class NumberType implements Type
{
    /**
     * @var string
     */
    private $value;

    /**
     * @var int
     */
    private $scale;

    public function add(NumberType $number): NumberType
    {
        return self::fromString(
            \bcadd(
                $this->value,
                $number->value
            )
        );
    }

    public function addFloat(float $number): NumberType
    {
        return $this->add(self::fromFloat($number));
    }

    public function addInt(int $number): NumberType
    {
        return $this->add(self::fromInt($number));
    }

    public function divide(NumberType $divisor): NumberType
    {
        if ($divisor->toInt() === 0) {
            throw new DivisionByZero($this);
        }

        return self::fromString(
            \bcdiv(
                $this->value,
                $divisor->toString(),
                $divisor->toPrecisionPoint()
            )
        );
    }

    public function divideFloat(float $divisor): NumberType
    {
        return $this->divide(self::fromFloat($divisor));
    }

    public function divideInt(int $divisor): NumberType
    {
        return $this->divide(self::fromInt($divisor));
    }

    public function multiply(NumberType $multiplier): NumberType
    {
        return self::fromString(
            \bcmul(
                $this->value,
                $multiplier->toString(),
                $multiplier->toPrecisionPoint()
            )
        );
    }

    public function multiplyFloat(float $multiplier): NumberType
    {
        return $this->multiply(self::fromFloat($multiplier));
    }

    public function multiplyInt(int $multiplier): NumberType
    {
        return $this->multiply(self::fromInt($multiplier));
    }

    public function subtract(NumberType $number): NumberType
    {
        return self::fromString(
            \bcsub(
                $this->value,
                $number->toString(),
                $number->toPrecisionPoint()
            )
        );
    }

    public function subtractFloat(float $number): NumberType
    {
        return $this->subtract(self::fromFloat($number));
    }

    public function subtractInt(int $number): NumberType
    {
        return $this->subtract(self::fromInt($number));
    }

    public function toFloat(): float
    {
        $this->assertValueIsValidValue(self::TYPE_FLOAT);
        return \floatval($this->toString());
    }

    public function toInt(): int
    {
        $this->assertValueIsValidValue(self::TYPE_INT);
        return \intval($this->value);
    }

    private function assertValueIsValidValue(string $type): void
    {
        if (
            \bccomp($this->value, (string) PHP_INT_MAX) === 1 ||
            \bccomp($this->value, (string) PHP_INT_MIN) === -1
        ) {
            throw new NumberOverflow(TypedString::asInt($this->value), $type);
        }
    }

    public function toPrecisionPoint(): int
    {
        return 0;
    }

    public function toString(): string
    {
        return $this->value;
    }

    public function toTypedString(): string
    {
        return TypedString::asInt($this->toString())->toString();
    }

    public static function fromFloat(float $value): NumberType
    {
        \var_dump($value);
        return self::fromString(\strval($value));
    }

    public static function fromString(string $value): NumberType
    {
	    if (! \is_numeric($value)) {
		    throw InvalidArgument::notSupportedValue($value, static::class);
	    }

        return new self($value);
    }

    public static function fromInt(int $value): NumberType
    {
        return self::fromString(\strval($value));
    }

    private function __construct(string $value)
    {
        $this->value = $value;

        $decimalSeparator = \strpos($value, '.');
        $scale = 0;
        if ($decimalSeparator > 0) {
            $scale = \strlen($value) - ($decimalSeparator + 1);
        }
        $this->scale = $scale;
    }
}
