<?php declare(strict_types=1);

namespace Star\Scalar;

use PHPUnit\Framework\TestCase;

final class ArrayObjectTest extends TestCase
{
    public function test_implode()
    {
        $this->assertEquals(
            StringObject::fromString('one two three'),
            ArrayObject::fromArray(['one', 'two', 'three'])->implode(' ')
        );
    }

    public function test_map()
    {
        $this->assertEquals(
            ArrayObject::fromArray([5, 6, 7]),
            ArrayObject::fromArray([0, 1, 2])->map(function (int $value) { return $value + 5; })
        );
    }

    public function test_keys()
    {
        $this->assertEquals(
            ArrayObject::fromArray([]),
            ArrayObject::fromArray([0, 1, 2])->keys()
        );
    }

    public function test_unique()
    {
        $this->assertEquals(
            ArrayObject::fromArray([]),
            ArrayObject::fromArray([0, 1, 2])->unique()
        );
    }

    public function test_merge()
    {
        $this->assertEquals(
            ArrayObject::fromArray([0, 1, 2, 3, 4]),
            ArrayObject::fromArray([0, 1, 2])->merge([3, 4])
        );
    }

    public function test_flip()
    {
        $this->assertEquals(
            ArrayObject::fromArray([2, 1, 0]),
            ArrayObject::fromArray([0, 1, 2])->flip()
        );
    }

    public function test_filter()
    {
        $this->assertEquals(
            ArrayObject::fromArray([0, 2]),
            ArrayObject::fromArray([0, 1, 2])->filter(function (int $value) { return $value % 2 === 0; })
        );
    }

    public function test_key_exists()
    {
        $this->assertTrue(
            ArrayObject::fromArray([0, 1, 2])->keyExists(2)
        );
        $this->assertFalse(
            ArrayObject::fromArray([0, 1, 2])->keyExists(6)
        );
    }

    public function test_value_exists()
    {
        $this->assertTrue(
            ArrayObject::fromArray([0, 1, 2])->valueExists(1)
        );
        $this->assertFalse(
            ArrayObject::fromArray([0, 1, 2])->valueExists(6)
        );
    }

    public function test_value_search()
    {
        $this->assertSame(
            1,
            ArrayObject::fromArray([0, 1, 2])->search(1)
        );
        $this->assertFalse(
            ArrayObject::fromArray([0, 1, 2])->search(5)
        );
    }

    public function test_chunk()
    {
        $this->assertEquals(
            ArrayObject::fromArray([]),
            ArrayObject::fromArray([0, 1, 2])->chunk()
        );
    }

    public function test_pad()
    {
        $this->assertEquals(
            ArrayObject::fromArray([]),
            ArrayObject::fromArray([0, 1, 2])->pad()
        );
    }

    public function test_pop()
    {
        $origin = ArrayObject::fromArray([0, 1, 2]);
        $this->assertEquals(
            ArrayObject::fromArray([0, 1]),
            $origin->pop()
        );
        $this->assertEquals(
            ArrayObject::fromArray([0, 1, 2]),
            $origin
        );
    }

    public function test_push()
    {
        $origin = ArrayObject::fromArray([0, 1, 2]);
        $this->assertEquals(
            ArrayObject::fromArray([0, 1, 2, 5, 6]),
            $origin->push(5, 6)
        );
        $this->assertEquals(
            ArrayObject::fromArray([0, 1, 2]),
            $origin
        );
    }

    public function test_reduce()
    {
        $this->assertEquals(
            ArrayObject::fromArray([]),
            ArrayObject::fromArray([0, 1, 2])->reduce()
        );
    }

    public function test_replace()
    {
        $this->assertEquals(
            ArrayObject::fromArray([]),
            ArrayObject::fromArray([0, 1, 2])->replace()
        );
    }

    public function test_shuffle()
    {
        $this->assertEquals(
            ArrayObject::fromArray([]),
            ArrayObject::fromArray([0, 1, 2])->shuffle()
        );
    }

    public function test_reverse()
    {
        $this->assertEquals(
            ArrayObject::fromArray([]),
            ArrayObject::fromArray([0, 1, 2])->reverse()
        );
    }

    public function test_shift()
    {
        $this->assertEquals(
            ArrayObject::fromArray([]),
            ArrayObject::fromArray([0, 1, 2])->shift()
        );
    }

    public function test_slice()
    {
        $this->assertEquals(
            ArrayObject::fromArray([]),
            ArrayObject::fromArray([0, 1, 2])->slice()
        );
    }

    public function test_sum()
    {
        $this->assertEquals(
            ArrayObject::fromArray([]),
            ArrayObject::fromArray([0, 1, 2])->sum()
        );
    }

    public function test_product()
    {
        $this->assertEquals(
            ArrayObject::fromArray([]),
            ArrayObject::fromArray([0, 1, 2])->product()
        );
    }

    public function test_values()
    {
        $this->assertEquals(
            ArrayObject::fromArray([0, 1, 2]),
            ArrayObject::fromArray([0, 1, 2])->values()
        );
    }

    public function test_unshift()
    {
        $this->assertEquals(
            ArrayObject::fromArray([]),
            ArrayObject::fromArray([0, 1, 2])->prepend()
        );
    }

    public function test_walk()
    {
        $this->assertEquals(
            ArrayObject::fromArray([]),
            ArrayObject::fromArray([0, 1, 2])->walk()
        );
    }
}
