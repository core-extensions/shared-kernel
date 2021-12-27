<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\Messaging;

abstract class Command extends DomainMessage
{
    public function messageType(): string
    {
        return static::TYPE_COMMAND;
    }
}
