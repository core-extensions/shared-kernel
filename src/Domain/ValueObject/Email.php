<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\ValueObject;

use CoreExtensions\Assert\Assert;

/**
 * @final
 */
class Email extends StringValue
{
    protected function setValue(string $value): void
    {
        $value = \mb_strtolower(\trim($value));
        Assert::email($value);

        parent::setValue($value);
    }
}
