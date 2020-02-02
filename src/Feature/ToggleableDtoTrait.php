<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Feature;

trait ToggleableDtoTrait
{
    /**
     * @var bool
     */
    private $enabled = true;

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }
}
