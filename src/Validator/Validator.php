<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Validator;

use CoreExtensions\SharedKernel\Validator\Exception\ValidationException;

interface Validator
{
    public const VALIDATION_GROUPS_OPTION = 'groups';

    /**
     * @param mixed $data
     * @param array $context
     *
     * @throws ValidationException
     */
    public function validate($data, array $context = []): void;

    /**
     * Checks whether given input data is supported by validator.
     *
     * @param mixed $data
     * @param array $context
     *
     * @return bool
     */
    public function supportsValidation($data, array $context = []): bool;
}
