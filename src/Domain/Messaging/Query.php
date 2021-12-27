<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\Messaging;

abstract class Query extends DomainMessage
{
    public function messageType(): string
    {
        return static::TYPE_QUERY;
    }
}
