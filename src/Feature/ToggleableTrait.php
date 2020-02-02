<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Feature;

trait ToggleableTrait
{
    /**
     * @var bool
     */
    private $enabled = true;

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function enable(): void
    {
        if ($this->isEnabled()) {
            return;
        }

        $this->doEnable();
    }

    public function disable(): void
    {
        if (!$this->isEnabled()) {
            return;
        }

        $this->doDisable();
    }

    protected function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    abstract protected function doEnable(): void;

    abstract protected function doDisable(): void;
}
