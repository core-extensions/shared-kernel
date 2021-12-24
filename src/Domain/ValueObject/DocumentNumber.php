<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\ValueObject;

use CoreExtensions\Assert\Assert;

/**
 * @final
 */
class DocumentNumber extends StringValue
{
    protected function setValue(string $value): void
    {
        Assert::stringNotEmpty(\trim($value));

        parent::setValue($value);
    }
}
