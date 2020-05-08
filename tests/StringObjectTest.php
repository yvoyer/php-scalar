<?php declare(strict_types=1);

namespace Star\Scalar;

use PHPUnit\Framework\TestCase;

final class StringObjectTest extends TestCase {
    public function test_it_should_return_string_value_as_string()
    {
        $this->assertEquals(
            'some string',
            StringObject::fromString('some string')->toString()
        );
    }

    public function test_it_should_return_int_value_as_string()
    {
        $this->assertEquals(
            StringObject::fromString('32'),
            StringObject::fromInt(32)
        );
    }

    public function test_it_should_return_float_value_as_string()
    {
        $this->assertEquals(
            StringObject::fromString('12.34'),
            StringObject::fromFloat(12.34)
        );
    }

    public function test_replace()
    {
        $this->assertEquals(
            StringObject::fromString('SomE ValuZ'),
            StringObject::fromString('SomE Value')->replace('e', 'Z')
        );
    }

    public function test_ireplace()
    {
        $this->assertEquals(
            StringObject::fromString('SomZ ValuZ'),
            StringObject::fromString('SomE Value')->ireplace('e', 'Z')
        );
    }

    public function test_find_first()
    {
        $this->assertEquals(
            IntegerObject::fromInt(6),
            StringObject::fromString('some string')->findFirst('t')
        );
    }

    public function test_find_last()
    {
        $this->assertEquals(
            IntegerObject::fromInt(9),
            StringObject::fromString('some value')->findLast('e')
        );
    }

    public function test_length()
    {
        $this->assertEquals(
            IntegerObject::fromInt(11),
            StringObject::fromString('some string')->length()
        );
    }

    public function test_lower()
    {
        $this->assertEquals(
            StringObject::fromString('some string'),
            StringObject::fromString('Some strIng')->toLower()
        );
    }

    public function test_upper()
    {
        $this->assertEquals(
            StringObject::fromString('SOME STRING'),
            StringObject::fromString('Some strIng')->toUpper()
        );
    }

    public function test_upper_first()
    {
        $this->assertEquals(
            StringObject::fromString('Some strIng'),
            StringObject::fromString('some strIng')->upperFirst()
        );
    }

    public function test_lower_first()
    {
        $this->assertEquals(
            StringObject::fromString('some strIng'),
            StringObject::fromString('Some strIng')->lowerFirst()
        );
    }

    public function test_upper_words()
    {
        $this->assertEquals(
            StringObject::fromString('Some StrIng'),
            StringObject::fromString('some strIng')->upperWords()
        );
    }

    public function test_trim()
    {
        $this->assertEquals(
            StringObject::fromString('Some strIng'),
            StringObject::fromString("Some strIng \t\n\r\0\x0B")->trim()
        );
    }

    public function test_trim_right()
    {
        $this->assertEquals(
            StringObject::fromString('Some strIng'),
            StringObject::fromString("Some strIng \t\n\r\0\x0B")->trimRight()
        );
    }

    public function test_trim_left()
    {
        $this->assertEquals(
            StringObject::fromString('Some strIng'),
            StringObject::fromString(" \t\n\r \vSome strIng")->trimLeft()
        );
    }

    public function test_repeat()
    {
        $this->assertEquals(
            StringObject::fromString('****'),
            StringObject::fromString("*")->repeat(4)
        );
    }

    public function test_chunk()
    {
        $this->assertEquals(
            StringObject::fromString("qw\ner\nty\nui\nop\n"),
            StringObject::fromString("qwertyuiop")->chunk(2)
        );
        $this->assertEquals(
            StringObject::fromString('qwertyuiop'),
            StringObject::fromString("qwertyuiop")->chunk(2, '')
        );
    }

    public function test_explode()
    {
        $string = 'some long string';
        $this->assertEquals(
            ArrayObject::fromArray([
                'some',
                'long',
                'string',
            ]),
            StringObject::fromString($string)->explode(' ')
        );
        $this->assertEquals(
            ArrayObject::fromArray([
                'some',
                'long string',
            ]),
            StringObject::fromString($string)->explode(' ', 2)
        );
    }

    public function test_substring()
    {
        $this->assertEquals(
            StringObject::fromString('ertyuiop'),
            StringObject::fromString("qwertyuiop")->substring(2)
        );
    }

    public function test_pad()
    {
        $this->assertEquals(
            StringObject::fromString('string****'),
            StringObject::fromString("string")->padRight(10, '*')
        );
        $this->assertEquals(
            StringObject::fromString('****string'),
            StringObject::fromString("string")->padLeft(10, '*')
        );
        $this->assertEquals(
            StringObject::fromString('**string**'),
            StringObject::fromString("string")->padBoth(10, '*')
        );
        $this->assertEquals(
            StringObject::fromString('string    '),
            StringObject::fromString("string")->padRight(10)
        );
        $this->assertEquals(
            StringObject::fromString('    string'),
            StringObject::fromString("string")->padLeft(10)
        );
        $this->assertEquals(
            StringObject::fromString('  string  '),
            StringObject::fromString("string")->padBoth(10)
        );
    }

    public function test_equals()
    {
        $this->assertTrue(
            StringObject::fromString('string')->equals('string')
        );
        $this->assertFalse(
            StringObject::fromString('string')->equals('String')
        );
    }

    /**
     * @depends test_equals
     */
    public function test_shuffle()
    {
        $this->assertFalse(
            StringObject::fromString('string')->shuffle()->equals('string')
        );
    }

    public function test_reverse()
    {
        $this->assertEquals(
            StringObject::fromString('gnirts'),
            StringObject::fromString('string')->reverse()
        );
    }

    public function test_starts_with()
    {
        $this->assertTrue(
            StringObject::fromString('string')->startsWith('s')
        );
        $this->assertFalse(
            StringObject::fromString('string')->startsWith('r')
        );
    }

    public function test_ends_with()
    {
        $this->assertTrue(
            StringObject::fromString('string')->endsWith('g')
        );
        $this->assertFalse(
            StringObject::fromString('string')->endsWith('t')
        );
    }

    public function test_contains()
    {
        $this->assertTrue(
            StringObject::fromString('string')->contains('r')
        );
        $this->assertFalse(
            StringObject::fromString('string')->contains('w')
        );
    }
}
