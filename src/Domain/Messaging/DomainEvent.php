<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\Messaging;

/**
 * Describes something happened in the past.
 * For real-time events we should use the different class ActionEvent.
 */
abstract class DomainEvent extends DomainMessage
{
    public function messageType(): string
    {
        return static::TYPE_EVENT;
    }
}
