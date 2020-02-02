<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Feature;

trait VersionedDtoTrait
{
    /**
     * @var int
     */
    private $version = 0;

    public function getVersion(): int
    {
        return $this->version;
    }

    public function setVersion(int $version): void
    {
        $this->version = $version;
    }
}
