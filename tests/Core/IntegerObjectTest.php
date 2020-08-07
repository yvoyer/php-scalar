<?php declare(strict_types=1);

namespace Star\Component\PhpType\Core;

use PHPUnit\Framework\TestCase;

final class IntegerObjectTest extends TestCase
{
    public function test_cast(): void
    {
        $this->assertSame(213, IntegerObject::fromInt(213)->toInt());
        $this->assertSame('213', IntegerObject::fromInt(213)->cast()->toString());
        $this->assertSame([213], IntegerObject::fromInt(213)->cast()->toArray());
        $this->assertSame(213.0, IntegerObject::fromInt(213)->cast()->toFloat());
    }
}
