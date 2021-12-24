<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\Messaging;

use Assert\Assertion;
use CoreExtensions\Assert\Assert;
use CoreExtensions\SharedKernel\Domain\ValueObject\DateTime;
use CoreExtensions\SharedKernel\Domain\ValueObject\UuidValue;
use CoreExtensions\SharedKernel\Feature\ArraySerializable;
use Ramsey\Uuid\Uuid;

abstract class DomainMessage implements Message, ArraySerializable
{
    protected string $messageName;
    protected UuidValue $uuid;
    protected DateTime $createdAt;
    protected array $metadata = [];

    public function messageName(): string
    {
        return $this->messageName;
    }

    public function uuid(): UuidValue
    {
        return $this->uuid;
    }

    public function createdAt(): DateTime
    {
        return $this->createdAt;
    }

    public function metadata(): array
    {
        return $this->metadata;
    }

    public function withMetadata(array $metadata): Message
    {
        $message = clone $this;
        $message->metadata = $metadata;

        return $message;
    }

    public function withAddedMetadata(string $key, $value): Message
    {
        Assert::stringNotEmpty($key, 'Invalid key');

        return $this->withMetadata(array_merge($this->metadata, [$key => $value]));
    }

    public function toArray(): array
    {
        return [
            'message_name' => $this->messageName,
            'uuid' => $this->uuid->toString(),
            'payload' => $this->payload(),
            'metadata' => $this->metadata,
            'created_at' => $this->createdAt(),
        ];
    }

    /**
     * @throws \ReflectionException
     */
    public static function fromArray(array $array): ArraySerializable
    {
        Assert::keysExists($array, ['message_name', 'uuid', 'payload', 'metadata', 'created_at']);
        Assert::stringNotEmpty($array['message_name'], 'DomainMessage.name is empty');
        Assert::isArray($array['metadata'], 'DomainMessage.metadata must be an array');
        Assert::isArray($array['payload'], 'DomainMessage.payload must be an array');

        $messageRef = new \ReflectionClass(static::class);

        /** @var $message self */
        $message = $messageRef->newInstanceWithoutConstructor();

        $message->uuid = UuidValue::fromString($array['uuid']);
        $message->messageName = $array['message_name'];
        $message->metadata = $array['metadata'];
        $message->createdAt = DateTime::fromString($array['created_at']);
        $message->payload= $array['payload'];

        return $message;
    }
}
