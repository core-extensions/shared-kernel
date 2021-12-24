<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\ValueObject;

use CoreExtensions\Assert\Assert;

/**
 * @final
 */
class PhoneNumber extends StringValue
{
    protected function setValue(string $value): void
    {
        Assert::phoneNumber(\trim($value));

        parent::setValue($value);
    }
}
