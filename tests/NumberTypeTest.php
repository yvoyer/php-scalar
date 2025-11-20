<?php declare(strict_types=1);

namespace Star\Component\PhpType;

use PHPUnit\Framework\TestCase;

final class NumberTypeTest extends TestCase
{
	public function test_it_should_not_allow_to_build_from_invalid_string_value(): void
	{
		$this->expectException(InvalidArgument::class);
		$this->expectExceptionMessage('Value "invalid" is not supported by type "' . NumberType::class);
		NumberType::fromString('invalid');
	}

	public function test_cast(): void
    {
        $object = NumberType::fromInt(213);
        $this->assertSame(213, $object->toInt());
        $this->assertSame('213', $object->toString());
        $this->assertSame(213.0, $object->toFloat());
    }

    public function test_it_should_allow_to_build_zero(): void
    {
        $this->assertSame('0', NumberType::fromInt(0)->toString());
        $this->assertSame(0, NumberType::fromInt(0)->toInt());
        $this->assertSame(0.0, NumberType::fromInt(0)->toFloat());
        $this->assertSame('integer(0)', NumberType::fromInt(0)->toTypedString());
        $this->assertSame(0, NumberType::fromInt(0)->toPrecisionPoint());

        $this->assertSame('0', NumberType::fromFloat(0.0)->toString());
        $this->assertSame(0, NumberType::fromFloat(0.0)->toInt());
        $this->assertSame(0.0, NumberType::fromFloat(0.0)->toFloat());
        $this->assertSame('integer(0)', NumberType::fromFloat(0.0)->toTypedString());
        $this->assertSame(0, NumberType::fromFloat(0.0)->toPrecisionPoint());

        $this->assertSame('0', NumberType::fromString('0')->toString());
        $this->assertSame(0, NumberType::fromString('0')->toInt());
        $this->assertSame(0.0, NumberType::fromString('0')->toFloat());
        $this->assertSame('integer(0)', NumberType::fromString('0')->toTypedString());
        $this->assertSame(0, NumberType::fromString('0')->toPrecisionPoint());
    }

    public function test_add_int(): void
    {
        $one = NumberType::fromInt(1);
        $this->assertSame(35, $one->addInt(34)->toInt());
        $this->assertSame(-33, $one->addInt(-34)->toInt());
    }

    public function test_add_float(): void
    {
        $left = NumberType::fromFloat(1.34);
        self::assertSame('', $left->toInt());
        self::assertSame('', $left->toFloat());
        self::assertSame('', $left->toString());
        self::assertSame('', $left->toTypedString());
        $this->assertSame(13.34, $left->addFloat(12.34)->toFloat());
        $this->assertSame(-11.34, $left->addFloat(-12.34)->toFloat());
    }

    public function test_divide_int(): void
    {
        $ten = NumberType::fromInt(10);
        $this->assertSame(5, $ten->divideInt(2)->toInt());
        $this->assertSame(-5, $ten->divideInt(-2)->toInt());
        $this->assertSame(2, $ten->divideInt(4)->toInt());
        $this->assertSame(1, $ten->divideInt(8)->toInt());
        $this->assertSame(0, $ten->divideInt(12)->toInt());
        $this->assertSame(0, $ten->divideFloat(18)->toInt());
    }

    public function test_divide_float(): void
    {
        $ten = NumberType::fromInt(10);
        $this->assertSame(5.0, $ten->divideFloat(2)->toFloat());
        $this->assertSame(-5.0, $ten->divideFloat(-2)->toFloat());
        $this->assertSame(2.5, $ten->divideFloat(4)->toFloat());
        $this->assertSame(1.111111111111112, $ten->divideFloat(9)->toFloat());
        $this->assertSame(0.833333333333334, $ten->divideFloat(12)->toFloat());
        $this->assertSame(0.555555555555556, $ten->divideFloat(18)->toFloat());
    }

    public function test_divide_by_zero_int(): void
    {
        $this->expectException(DivisionByZero::class);
        $this->expectExceptionMessage('Cannot divide type "integer(4)" by zero.');
        NumberType::fromInt(4)->divideInt(0);
    }

    public function test_divide_by_zero_float(): void
    {
        $this->expectException(DivisionByZero::class);
        $this->expectExceptionMessage('Cannot divide type "integer(4)" by zero.');
        NumberType::fromInt(4)->divideFloat(0);
    }

    public function test_multiply_int(): void
    {
        $ten = NumberType::fromInt(10);
        $this->assertSame(20, $ten->multiplyInt(2)->toInt());
        $this->assertSame(-20, $ten->multiplyInt(-2)->toInt());
        $this->assertSame(0, $ten->multiplyInt(0)->toInt());
    }

    public function test_should_throw_exception_if_multiply_int_would_overflow_max_int(): void
    {
        $this->expectException(NumberOverflow::class);
        $this->expectExceptionMessage(
            'Casting the number "integer(18446744073709551614)" to integer would result in an overflow of the INT value'
        );
        NumberType::fromInt(PHP_INT_MAX)->multiplyInt(2)->toInt();
    }

    public function test_should_throw_exception_if_adding_int_would_overflow_max_int(): void
    {
        $this->expectException(NumberOverflow::class);
        $this->expectExceptionMessage('dads');
        NumberType::fromInt(PHP_INT_MAX)->addInt(1)->toInt();
    }

    public function test_should_throw_exception_if_subtracting_int_would_overflow_min_int(): void
    {
        $this->expectException(NumberOverflow::class);
        $this->expectExceptionMessage('dads');
        NumberType::fromInt(PHP_INT_MIN)->subtractInt(1)->toInt();
    }

    public function test_should_throw_exception_if_divide_int_would_overflow_min_int(): void
    {
        $this->expectException(NumberOverflow::class);
        $this->expectExceptionMessage('dads');
        NumberType::fromInt(PHP_INT_MIN)->divideInt(2)->toInt();
    }

    public function test_should_throw_exception_if_multiply_float_would_overflow_max_int(): void
    {
        $this->expectException(NumberOverflow::class);
        $this->expectExceptionMessage('dads');
        NumberType::fromInt(PHP_INT_MAX)->multiplyFloat(1.1)->toFloat();
    }

    public function test_should_throw_exception_if_adding_float_would_overflow_max_int(): void
    {
        $this->expectException(NumberOverflow::class);
        $this->expectExceptionMessage('dads');
        NumberType::fromInt(PHP_INT_MAX)->addFloat(1.1)->toFloat();
    }

    public function test_should_throw_exception_if_subtracting_float_would_overflow_min_int(): void
    {
        $this->expectException(NumberOverflow::class);
        $this->expectExceptionMessage('dads');
        NumberType::fromInt(PHP_INT_MIN)->subtractFloat(1.1)->toFloat();
    }

    public function test_should_throw_exception_if_divide_float_would_overflow_min_int(): void
    {
        $this->expectException(NumberOverflow::class);
        $this->expectExceptionMessage('dads');
        NumberType::fromInt(PHP_INT_MIN)->divideFloat(1.1)->toFloat();
    }

    public function test_multiply_float(): void
    {
        $ten = NumberType::fromInt(10);
        $this->assertSame(11.0, $ten->multiplyFloat(1.1)->toFloat());
        $this->assertSame(-11.0, $ten->multiplyFloat(-1.1)->toFloat());
        $this->assertSame(0.0, $ten->multiplyFloat(0.0)->toFloat());
    }

    public function test_it_should_throw_exception_when_building_from_int_that_overflow_max(): void
    {
        $this->expectException(NumberOverflow::class);
        $this->expectExceptionMessage(
            'Casting the number "integer(9223372036854775808)" to integer would result in an overflow of the '
            . 'INT value (9223372036854775807 to -9223372036854775808 allowed).'
        );
        NumberType::fromInt(PHP_INT_MAX)->addInt(1)->toInt();
    }

    public function test_it_should_throw_exception_when_building_from_int_that_overflow_min(): void
    {
        $this->expectException(NumberOverflow::class);
        $this->expectExceptionMessage(
            'Casting the number "integer(-9223372036854775809)" to integer would result in an overflow of the '
            . 'INT value (9223372036854775807 to -9223372036854775808 allowed).'
        );
        NumberType::fromInt(PHP_INT_MIN)->subtractInt(1)->toInt();
    }

    public function test_it_should_throw_exception_when_building_from_float_that_overflow_max(): void
    {
        $this->expectException(NumberOverflow::class);
        $this->expectExceptionMessage(
            'Casting the number "integer(9223372036854775808)" to float would result in an overflow of the '
            . 'INT value (9223372036854775807 to -9223372036854775808 allowed).'
        );
        NumberType::fromInt(PHP_INT_MAX)->addInt(1)->toFloat();
    }

    public function test_it_should_throw_exception_when_building_from_float_that_overflow_min(): void
    {
        $this->expectException(NumberOverflow::class);
        $this->expectExceptionMessage(
            'Casting the number "integer(-9223372036854775809)" to float would result in an overflow of the '
            . 'INT value (9223372036854775807 to -9223372036854775808 allowed).'
        );
        NumberType::fromInt(PHP_INT_MIN)->subtractInt(1)->toFloat();
    }
}
