<?php declare(strict_types=1);

namespace Star\Component\PhpType\Core;

use PHPUnit\Framework\TestCase;

final class ArrayObjectTest extends TestCase
{

    public function test_implode(): void
    {
        $this->assertSame(
            'one two three',
            ArrayObject::fromArray(['one', 'two', 'three'])->implode(' ')->toString()
        );
    }

//    public function test_map(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([5, 6, 7]),
//            ArrayObject::fromArray([0, 1, 2])->map(function (int $value) { return $value + 5; })
//        );
//    }
//
//    public function test_keys(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([]),
//            ArrayObject::fromArray([0, 1, 2])->keys()
//        );
//    }
//
//    public function test_unique(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([]),
//            ArrayObject::fromArray([0, 1, 2])->unique()
//        );
//    }
//
//    public function test_merge(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([0, 1, 2, 3, 4]),
//            ArrayObject::fromArray([0, 1, 2])->merge([3, 4])
//        );
//    }
//
//    public function test_flip(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([2, 1, 0]),
//            ArrayObject::fromArray([0, 1, 2])->flip()
//        );
//    }
//
//    public function test_filter(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([0, 2]),
//            ArrayObject::fromArray([0, 1, 2])->filter(function (int $value) { return $value % 2 === 0; })
//        );
//    }
//
//    public function test_key_exists(): void
//    {
//        $this->assertTrue(
//            ArrayObject::fromArray([0, 1, 2])->keyExists(2)
//        );
//        $this->assertFalse(
//            ArrayObject::fromArray([0, 1, 2])->keyExists(6)
//        );
//    }
//
//    public function test_value_exists(): void
//    {
//        $this->assertTrue(
//            ArrayObject::fromArray([0, 1, 2])->valueExists(1)
//        );
//        $this->assertFalse(
//            ArrayObject::fromArray([0, 1, 2])->valueExists(6)
//        );
//    }
//
//    public function test_value_search(): void
//    {
//        $this->assertSame(
//            1,
//            ArrayObject::fromArray([0, 1, 2])->search(1)
//        );
//        $this->assertFalse(
//            ArrayObject::fromArray([0, 1, 2])->search(5)
//        );
//    }
//
//    public function test_chunk(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([]),
//            ArrayObject::fromArray([0, 1, 2])->chunk()
//        );
//    }
//
//    public function test_pad(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([]),
//            ArrayObject::fromArray([0, 1, 2])->pad()
//        );
//    }
//
//    public function test_pop(): void
//    {
//        $origin = ArrayObject::fromArray([0, 1, 2]);
//        $this->assertSame(
//            ArrayObject::fromArray([0, 1]),
//            $origin->pop()
//        );
//        $this->assertSame(
//            ArrayObject::fromArray([0, 1, 2]),
//            $origin
//        );
//    }
//
//    public function test_push(): void
//    {
//        $origin = ArrayObject::fromArray([0, 1, 2]);
//        $this->assertSame(
//            ArrayObject::fromArray([0, 1, 2, 5, 6]),
//            $origin->push(5, 6)
//        );
//        $this->assertSame(
//            ArrayObject::fromArray([0, 1, 2]),
//            $origin
//        );
//    }
//
//    public function test_reduce(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([]),
//            ArrayObject::fromArray([0, 1, 2])->reduce()
//        );
//    }
//
//    public function test_replace(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([]),
//            ArrayObject::fromArray([0, 1, 2])->replace()
//        );
//    }
//
//    public function test_shuffle(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([]),
//            ArrayObject::fromArray([0, 1, 2])->shuffle()
//        );
//    }
//
//    public function test_reverse(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([]),
//            ArrayObject::fromArray([0, 1, 2])->reverse()
//        );
//    }
//
//    public function test_shift(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([]),
//            ArrayObject::fromArray([0, 1, 2])->shift()
//        );
//    }
//
//    public function test_slice(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([]),
//            ArrayObject::fromArray([0, 1, 2])->slice()
//        );
//    }
//
//    public function test_sum(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([]),
//            ArrayObject::fromArray([0, 1, 2])->sum()
//        );
//    }
//
//    public function test_product(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([]),
//            ArrayObject::fromArray([0, 1, 2])->product()
//        );
//    }
//
//    public function test_values(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([0, 1, 2]),
//            ArrayObject::fromArray([0, 1, 2])->values()
//        );
//    }
//
//    public function test_unshift(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([]),
//            ArrayObject::fromArray([0, 1, 2])->prepend()
//        );
//    }
//
//    public function test_walk(): void
//    {
//        $this->assertSame(
//            ArrayObject::fromArray([]),
//            ArrayObject::fromArray([0, 1, 2])->walk()
//        );
//    }
}
