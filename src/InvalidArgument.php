<?php declare(strict_types=1);

namespace Star\Component\PhpType;

use InvalidArgumentException;

final class InvalidArgument extends InvalidArgumentException {
	public static function notSupportedValue($value, string $type): self
	{
		return new self(
			\sprintf(
				'Value "%s" is not supported by type "%s".',
				$value,
				$type
			)
		);
	}
}
