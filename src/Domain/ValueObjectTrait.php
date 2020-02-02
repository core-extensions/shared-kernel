<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain;

trait ValueObjectTrait
{
    public function equalsTo($valueObject): bool
    {
        if (!$valueObject instanceof $this) {
            return false;
        }

        $selfValue = $this->toScalar();
        /** @var ValueObject $valueObject */
        $checkValue = $valueObject->toScalar();

        if (\gettype($selfValue) !== \gettype($checkValue)) {
            return false;
        }

        if (\is_array($selfValue)) {
            \array_multisort($selfValue);
            $selfValue = \serialize($selfValue);
        }

        if (\is_array($checkValue)) {
            \array_multisort($checkValue);
            $checkValue = \serialize($checkValue);
        }

        return $selfValue === $checkValue;
    }

    /**
     * @return mixed
     */
    abstract public function toScalar();
}
