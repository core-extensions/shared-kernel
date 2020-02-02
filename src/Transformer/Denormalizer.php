<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Transformer;

use CoreExtensions\SharedKernel\Transformer\Exception\NormalizationException;

interface Denormalizer
{
    /**
     * Denormalizes data back into an object of the given class.
     *
     * @param mixed  $data
     * @param string $targetType
     * @param array  $context
     *
     * @throws NormalizationException
     *
     * @return mixed
     */
    public function denormalize($data, string $targetType, array $context = []);

    /**
     * Checks whether the given class is supported for normalization by this normalizer.
     *
     * @param string $targetType
     * @param array  $context
     *
     * @return bool
     */
    public function supportsDenormalization(string $targetType, array $context = []): bool;
}
