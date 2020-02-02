<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain;

abstract class DomainEntity implements Entity
{
    use EntityTrait;

    /**
     * We do not allow public access to __construct, this way we make sure that an entity can only
     * be constructed by static factories.
     */
    protected function __construct()
    {
    }
}
