<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\Aggregate;

trait EventProducerTrait
{
    protected int $version = 0;

    /**
     * @var AggregateChanged[]
     */
    protected array $recordedEvents = [];

    /**
     * Get pending events and reset stack
     *
     * @return AggregateChanged[]
     */
    protected function popRecordedEvents(): array
    {
        $pendingEvents = $this->recordedEvents;

        $this->recordedEvents = [];

        return $pendingEvents;
    }

    /**
     * Record an aggregate changed event
     */
    protected function recordThat(AggregateChanged $event): void
    {
        ++$this->version;

        $this->recordedEvents[] = $event->withVersion($this->version);

        $this->apply($event);
    }

    /**
     * Apply given event
     */
    abstract protected function apply(AggregateChanged $event): void;
}
