<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Transformer;

use CoreExtensions\SharedKernel\Transformer\Exception\NormalizationException;

interface Normalizer
{
    /**
     * Normalizes an object into a set of arrays/scalars.
     *
     * @param mixed $object
     * @param array $context
     *
     * @throws NormalizationException
     *
     * @return mixed
     */
    public function normalize($object, array $context = []);

    /**
     * Checks whether the given class is supported for normalization by this normalizer.
     *
     * @param mixed $data
     * @param array $context
     *
     * @return bool
     */
    public function supportsNormalization($data, array $context = []): bool;
}
