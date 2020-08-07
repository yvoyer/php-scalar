<?php declare(strict_types=1);

namespace Star\Component\PhpType\Core;

use PHPUnit\Framework\TestCase;
use Star\Component\PhpType\TypeCastNotSupported;

final class StringObjectTest extends TestCase {
    public function test_it_should_not_support_float_type_cast(): void
    {
        $this->expectException(TypeCastNotSupported::class);
        $this->expectExceptionMessage('Type "string(something)" cannot be casted to "float".');
        StringObject::fromString('something')->cast()->toFloat();
    }

    public function test_it_should_not_support_int_type_cast(): void
    {
        $this->expectException(TypeCastNotSupported::class);
        $this->expectExceptionMessage('Type "string(something)" cannot be casted to "integer".');
        StringObject::fromString('something')->cast()->toInt();
    }

    public function test_it_should_not_support_bool_type_cast(): void
    {
        $this->expectException(TypeCastNotSupported::class);
        $this->expectExceptionMessage('Type "string(something)" cannot be casted to "boolean".');
        StringObject::fromString('something')->cast()->toBool();
    }

    public function test_it_should_support_float_type_cast(): void
    {
        $this->assertSame(12.34, StringObject::fromString('12.34')->cast()->toFloat());
    }

    public function test_it_should_not_support_string_type_cast(): void
    {
        $this->assertSame('something', StringObject::fromString('something')->cast()->toString());
    }

    public function test_it_should_not_support_array_type_cast(): void
    {
        $this->assertSame(['something'], StringObject::fromString('something')->cast()->toArray());
    }

    public function test_it_should_return_string_value_as_string(): void
    {
        $this->assertSame(
            'some string',
            StringObject::fromString('some string')->toString()
        );
    }

//    public function test_it_should_return_int_value_as_string(): void
//    {
//        $this->assertSame(
//            StringObject::fromString('32'),
//            StringObject::fromInt(32)
//        );
//    }
//
//    public function test_it_should_return_float_value_as_string(): void
//    {
//        $this->assertSame(
//            StringObject::fromString('12.34'),
//            StringObject::fromFloat(12.34)
//        );
//    }
//
    public function test_replace_with_case(): void
    {
        $this->assertSame(
            'SomE ValuZ',
            StringObject::fromString('SomE Value')
                ->replaceWithCase('e', 'Z')
                ->toString()
        );
    }

    public function test_replace_without_case(): void
    {
        $this->assertSame(
            'SomZ ValuZ',
            StringObject::fromString('SomE Value')
                ->replaceWithoutCase('e', 'Z')
                ->toString()
        );
    }

    public function test_find_first(): void
    {
        $this->assertSame(
            6,
            StringObject::fromString('some string')->findFirstPosition('t')->toInt()
        );
    }

    public function test_find_last(): void
    {
        $this->assertSame(
            9,
            StringObject::fromString('some value')->findLastPosition('e')->toInt()
        );
    }

    public function test_length(): void
    {
        $this->assertSame(
            11,
            StringObject::fromString('some string')->length()->cast()->toInt()
        );
    }

    public function test_lower(): void
    {
        $this->assertSame(
            'some string',
            StringObject::fromString('Some strIng')->toLower()->toString()
        );
    }

    public function test_upper(): void
    {
        $this->assertSame(
            'SOME STRING',
            StringObject::fromString('Some strIng')->toUpper()->toString()
        );
    }

    public function test_upper_first(): void
    {
        $this->assertSame(
            'Some strIng',
            StringObject::fromString('some strIng')->toUpperFirst()->toString()
        );
    }

    public function test_lower_first(): void
    {
        $this->assertSame(
            'some strIng',
            StringObject::fromString('Some strIng')->toLowerFirst()->toString()
        );
    }

    public function test_upper_words(): void
    {
        $this->assertSame(
            'Some StrIng',
            StringObject::fromString('some strIng')->toUpperWords()->toString()
        );
    }

    public function test_trim(): void
    {
        $this->assertSame(
            'Some strIng',
            StringObject::fromString("Some strIng \t\n\r\0\x0B")->trim()->toString()
        );
    }

    public function test_trim_right(): void
    {
        $this->assertSame(
            'Some strIng',
            StringObject::fromString("Some strIng \t\n\r\0\x0B")->trimRight()->toString()
        );
    }

    public function test_trim_left(): void
    {
        $this->assertSame(
            'Some strIng',
            StringObject::fromString(" \t\n\r \vSome strIng")->trimLeft()->toString()
        );
    }

    public function test_repeat(): void
    {
        $this->assertSame(
            '****',
            StringObject::fromString("*")->repeat(4)->toString()
        );
    }

    public function test_split(): void
    {
        $this->assertSame(
            "qw\ner\nty\nui\nop\n",
            StringObject::fromString("qwertyuiop")->split(2)->toString()
        );
        $this->assertSame(
            'qw er ty ui op ',
            StringObject::fromString("qwertyuiop")->split(2, ' ')->toString()
        );
    }

    public function test_explode(): void
    {
        $string = 'some long string';
        $this->assertSame(
            'array(some,long,string)',
            StringObject::fromString($string)->explode(' ')->toTypedString()
        );
        $this->assertSame(
            'array(some,long string)',
            StringObject::fromString($string)->explode(' ', 2)->toTypedString()
        );
    }

    public function test_substring(): void
    {
        $this->assertSame(
            'ertyuiop',
            StringObject::fromString("qwertyuiop")->substring(2)->toString()
        );
    }

    public function test_pad(): void
    {
        $this->assertSame(
            'string****',
            StringObject::fromString("string")->padRight(10, '*')->toString()
        );
        $this->assertSame(
            '****string',
            StringObject::fromString("string")->padLeft(10, '*')->toString()
        );
        $this->assertSame(
            '**string**',
            StringObject::fromString("string")->pad(10, '*')->toString()
        );
        $this->assertSame(
            'string    ',
            StringObject::fromString("string")->padRight(10)->toString()
        );
        $this->assertSame(
            '    string',
            StringObject::fromString("string")->padLeft(10)->toString()
        );
        $this->assertSame(
            '  string  ',
            StringObject::fromString("string")->pad(10)->toString()
        );
    }

    public function test_equals(): void
    {
        $this->assertTrue(
            StringObject::fromString('string')->equals('string')
        );
        $this->assertFalse(
            StringObject::fromString('string')->equals('String')
        );
    }

    public function test_shuffle(): void
    {
        $this->assertFalse(
            StringObject::fromString('string')->shuffle()->equals('string')
        );
    }

    public function test_reverse(): void
    {
        $this->assertSame(
            'gnirts',
            StringObject::fromString('string')->reverse()->toString()
        );
    }

    public function test_starts_with(): void
    {
        $this->assertTrue(
            StringObject::fromString('string')->startsWith('s')
        );
        $this->assertFalse(
            StringObject::fromString('string')->startsWith('r')
        );
    }

    public function test_ends_with(): void
    {
        $this->assertTrue(
            StringObject::fromString('string')->endsWith('g')
        );
        $this->assertFalse(
            StringObject::fromString('string')->endsWith('t')
        );
    }

    public function test_contains(): void
    {
        $this->assertTrue(
            StringObject::fromString('string')->contains('r')
        );
        $this->assertFalse(
            StringObject::fromString('string')->contains('w')
        );
    }
}
