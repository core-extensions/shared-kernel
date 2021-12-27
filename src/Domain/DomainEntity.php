<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain;

abstract class DomainEntity implements Entity
{
    use EntityTrait;

    protected function __construct()
    {
    }
}
