<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\Messaging;

use CoreExtensions\SharedKernel\Domain\ValueObject\DateTime;
use CoreExtensions\SharedKernel\Domain\ValueObject\UuidValue;

interface Message
{
    public const TYPE_COMMAND = 'command';
    public const TYPE_EVENT = 'event';
    public const TYPE_QUERY = 'query';

    public function messageName(): string;

    public function messageType(): string;

    public function uuid(): UuidValue;

    public function createdAt(): DateTime;

    public function payload(): array;

    public function metadata(): array;

    public function withMetadata(array $metadata): self;

    /**
     * Returns new instance of message with $key => $value added to metadata.
     *
     * Given value must have a scalar or array type.
     */
    public function withAddedMetadata(string $key, $value): self;
}
