<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\ParameterBag\Exception;

use CoreExtensions\SharedKernel\Exception\InvalidArgumentException;

class ParameterNotFoundException extends InvalidArgumentException
{
    public static function withName(string $name): self
    {
        return new self(
            \sprintf(
                'Parameter with name "%s" does not exists in the container.',
                $name
            )
        );
    }
}
