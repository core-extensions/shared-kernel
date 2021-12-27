<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\Aggregate;

use CoreExtensions\SharedKernel\Exception\LogicException;

abstract class AggregateRoot
{
    use EventProducerTrait;

    abstract protected function aggregateId(): string;

    final protected function apply(AggregateChanged $event): void
    {
        $handler = $this->resolveEventHandlerFor($event);
        if (!\method_exists($this, $handler)) {
            throw new LogicException(
                \sprintf(
                    'Missing event handler method %s for aggregate root %s',
                    $handler,
                    \get_class($this)
                )
            );
        }

        $this->{$handler}($event);
    }

    protected function resolveEventHandlerFor(AggregateChanged $event): string
    {
        return 'apply'.\implode('', \array_slice(\explode('\\', \get_class($event)), -1));
    }
}
